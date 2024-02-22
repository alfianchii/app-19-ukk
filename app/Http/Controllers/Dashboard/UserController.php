<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\Users\AllOfUsersExport;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    // PROPERTIES
    protected array $rules = [
        "nik" => ["required", "digits:16", "string", "unique:mst_users,nik"],
        "full_name" => ["required", "max:50"],
        "username" => ["required", "unique:mst_users,username", "min:3", "max:30"],
        "gender" => ["required", "in:male,female"],
        "born" => ["required", "date"],
        "address" => ["required"],
        "phone" => ["required", "digits_between:11,13", "starts_with:08", "numeric", "unique:mst_users,phone"],
        "email" => ["required", "unique:mst_users,email", "email:rfc,dns"],
        "role" => ["required", "in:officer,reader"],
        "profile_picture" => ["nullable", "image", "file", "max:5120"],
        "password" => ["required", "confirmed", "min:6"],
        "password_confirmation" => ["required", "min:6", "required_with:password", "same:password"],
    ];


    // CORES
    public function index()
    {
        $theUser = Auth::user();

        if ($theUser->role == "admin") {
            $users = User::whereNot("id_user", $theUser->id_user)->get();

            $viewVariables = [
                "title" => "User",
                "users" => $users,
            ];
            return view('pages.dashboard.actors.admin.users.index', $viewVariables);
        };

        return view("errors.403");
    }

    public function create()
    {
        $theUser = Auth::user();

        if ($theUser->role == "admin") {
            $viewVariables = [
                "title" => "Create User",
            ];
            return view('pages.dashboard.actors.admin.users.create', $viewVariables);
        };

        return view("errors.403");
    }

    public function store(Request $request)
    {
        $theUser = Auth::user();

        if ($theUser->role == "admin") {
            $credentials = $request->validate($this->rules);
            $credentials["full_name"] = ucwords($credentials["full_name"]);
            $credentials["password"] = Hash::make($credentials["password"]);
            $credentials["created_by"] = $theUser->id_user;

            if ($request->has("profile_picture")) {
                $imageOriginalPath = $credentials["profile_picture"]->store("user/profile-pictures");
                $credentials["profile_picture"] = $imageOriginalPath;
                $croppedImage = Image::make("storage/" . $imageOriginalPath);
                $croppedImage->fit(1200, 1200, function ($constraint) {
                    $constraint->upsize();
                }, "center");

                Storage::put($imageOriginalPath, $croppedImage->stream());
            }

            $user = User::create($credentials);
            return redirect("/dashboard/users/$user->id_user")->withSuccess("The account of @$user->username has been created!");
        };

        return view("errors.403");
    }

    public function show(User $user)
    {
        $theUser = Auth::user();

        if ($theUser->role == "admin") {
            $viewVariables = [
                "title" => "@" . $user->username,
                "user" => $user,
            ];
            return view('pages.dashboard.actors.admin.users.show', $viewVariables);
        };

        if ($theUser->role == "officer") {
            if ($theUser === $user->id_user) {
                $viewVariables = [
                    "title" => "@" . $user->username,
                    "user" => $user,
                ];
                return view('pages.dashboard.actors.custom.users.show', $viewVariables);
            }
        };

        if ($theUser->role == "reader") {
            if ($theUser === $user->id_user) {
                $viewVariables = [
                    "title" => "@" . $user->username,
                    "user" => $user,
                ];
                return view('pages.dashboard.actors.custom.users.show', $viewVariables);
            }
        };

        return view("errors.403");
    }

    public function edit(User $user)
    {
        $theUser = Auth::user();

        if ($theUser->role == "admin") {
            $viewVariables = [
                "title" => "@" . $user->username,
                "user" => $user,
            ];
            return view('pages.dashboard.actors.admin.users.edit', $viewVariables);
        };

        return view("errors.403");
    }

    public function update(Request $request, User $user)
    {
        $theUser = Auth::user();

        if ($theUser->role == "admin") {
            $rules = $this->rules;

            unset($rules["password"], $rules['password_confirmation']);
            if ($request->nik) unset($rules["nik"]);
            if ($request->username) unset($rules["username"]);
            if ($request->email) unset($rules["email"]);
            if ($request->phone) unset($rules["phone"]);
            $credentials = $request->validate($rules);
            $credentials["full_name"] = ucwords($credentials["full_name"]);
            $credentials["updated_by"] = $theUser->id_user;

            if ($request->has("profile_picture")) {
                if ($user->profile_picture) Storage::delete($user->profile_picture);

                $imageOriginalPath = $credentials["profile_picture"]->store("user/profile-pictures");
                $credentials["profile_picture"] = $imageOriginalPath;
                $croppedImage = Image::make("storage/" . $imageOriginalPath);
                $croppedImage->fit(1200, 1200, function ($constraint) {
                    $constraint->upsize();
                }, "center");

                Storage::put($imageOriginalPath, $croppedImage->stream());
            }

            $user->update($credentials);
            return redirect("/dashboard/users/$user->id_user")->withSuccess("The account of @$user->username has been created!");
        };

        return view("errors.403");
    }

    public function destroy(User $user)
    {
        $theUser = Auth::user();

        if ($theUser->role == "admin") {
            try {
                if ($user->id_user === $theUser->id_user) throw new \Exception("You cannot unactivate yourself.");
                if ($user->role !== "admin") {
                    if (!$user->update(["updated_by" => $theUser->id_user, "flag_active" => "N", "deleted_at" => null]))
                        throw new \Exception("Error deactivating the user.");
                } else return $this->responseJsonMessage("You cannot non-active Admin's account.", 422);
            } catch (\PDOException | ModelNotFoundException | QueryException | \Exception $e) {
                return $this->responseJsonMessage($e->getMessage(), 500);
            } catch (\Exception $e) {
                return $this->responseJsonMessage("An error occurred: " . $e->getMessage(), 500);
            }

            return $this->responseJsonMessage("The account of @$user->username has been non-activated!");
        };

        return $this->responseJsonMessage("You are unauthorized to do this action.", 422);
    }

    public function activate(User $user)
    {
        $theUser = Auth::user();

        if ($theUser->role == "admin") {
            try {
                if ($user->id_user === $theUser->id_user) throw new \Exception("You cannot activating yourself.");
                if ($user->role !== "admin") {
                    if (!$user->update(["updated_by" => $theUser->id_user, "flag_active" => "Y", "deleted_at" => null]))
                        throw new \Exception("Error activating the user.");;
                } else return $this->responseJsonMessage("You cannot activate Admin's account.", 422);
            } catch (\PDOException | ModelNotFoundException | QueryException | \Exception $e) {
                return $this->responseJsonMessage($e->getMessage(), 500);
            } catch (\Exception $e) {
                return $this->responseJsonMessage("An error occurred: " . $e->getMessage(), 500);
            }

            return $this->responseJsonMessage("The account of @$user->username has been activated!");
        };

        return $this->responseJsonMessage("You are unauthorized to do this action.", 422);
    }

    public function changePassword(Request $request, User $user)
    {
        $theUser = Auth::user();

        if ($theUser->role == "admin") {
            $theUser = Auth::user();

            $rules = [
                "password" => $this->rules["password"],
                "password_confirmation" => $this->rules["password_confirmation"],
            ];

            $credentials = $request->validate($rules);
            $credentials["password"] = Hash::make($credentials["password"]);
            $credentials["updated_by"] = $theUser->id_user;

            $user->update($credentials);
            return redirect("/dashboard/users/$user->id_user")->withSuccess("The password of @$user->username has been updated!");
        }

        return view("errors.403");
    }

    public function destroyProfilePicture(User $user)
    {
        $theUser = Auth::user();

        if ($theUser->role == "admin") {
            try {
                if ($user->role !== "admin") {
                    if (!Storage::delete($user->profile_picture)) throw new \Exception("Error removing the profile picture.");
                    if (!$user->update(["profile_picture" => null]))
                        throw new \Exception("Error removing the profile picture.");
                } else return $this->responseJsonMessage("You cannot remove Admin's profile picture.", 422);
            } catch (\PDOException | ModelNotFoundException | QueryException | \Exception $e) {
                return $this->responseJsonMessage($e->getMessage(), 500);
            } catch (\Exception $e) {
                return $this->responseJsonMessage("An error occurred: " . $e->getMessage(), 500);
            }

            return $this->responseJsonMessage("The profile picture has been removed!");
        }

        if ($theUser->role == "officer" || $theUser->role == "reader") {
            try {
                if ($theUser->id_user === $user->id_user) {
                    if (!Storage::delete($user->profile_picture)) throw new \Exception("Error removing the profile picture.");
                    if (!$user->update(["profile_picture" => null]))
                        throw new \Exception("Error removing the profile picture.");
                } else return $this->responseJsonMessage("You cannot remove other's profile picture.", 422);
            } catch (\PDOException | ModelNotFoundException | QueryException | \Exception $e) {
                return $this->responseJsonMessage($e->getMessage(), 500);
            } catch (\Exception $e) {
                return $this->responseJsonMessage("An error occurred: " . $e->getMessage(), 500);
            }

            return $this->responseJsonMessage("The profile picture has been removed!");
        }

        return $this->responseJsonMessage("You are unauthorized to do this action.", 422);
    }

    public function export(Request $request)
    {
        $validator = Validator::make($request->all(), $this->exportRules);
        if ($validator->fails()) return view("errors.403");
        $creds = $validator->validate();

        $fileName = now()->format("Y_m_d_His") . "." . strtolower($creds["type"]);
        $writterType = constant("\Maatwebsite\Excel\Excel::" . $creds["type"]);

        $theUser = Auth::user();
        if ($theUser->role == "admin") {
            if ($creds["table"] === "all-of-users") return (new AllOfUsersExport)->download($fileName, $writterType);
        };

        return view("errors.403");
    }
}
