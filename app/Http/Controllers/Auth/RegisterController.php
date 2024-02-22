<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class RegisterController extends Controller
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
        "profile_picture" => ["nullable", "image", "file", "max:5120"],
        "password" => ["required", "confirmed", "min:6"],
        "password_confirmation" => ["required", "min:6", "required_with:password", "same:password"],
    ];


    // CORES
    public function index()
    {
        $viewVariables = [
            "title" => "Register",
        ];
        return view('pages.auth.register.index', $viewVariables);
    }

    public function register(Request $request)
    {
        $credentials = $request->validate($this->rules);
        $credentials["full_name"] = ucwords($credentials["full_name"]);
        $credentials["password"] = Hash::make($credentials["password"]);

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
        $user->update(["created_by" => $user->id_user]);

        Auth::login($user);
        return redirect()->intended('/dashboard')->withSuccess("Account has been created!");
    }
}
