<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\Book\Receipt\AllOfReceiptsExport;
use App\Http\Controllers\Controller;
use App\Models\MasterBook;
use App\Models\RecBookReceipt;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RecBookReceiptController extends Controller
{
    // PROPERTIES
    protected array $rules = [
        "id_user" => ["required", "exists:mst_users,id_user"],
        "id_book" => ["required", "exists:mst_books,id_book"],
        "amount" => ["required", "numeric", "integer", "min:1", "max:9"],
        "from_time" => ["required", "date"],
        "to_time" => ["required", "date"],
    ];


    // CORES
    public function index()
    {
        $user = Auth::user();
        $receipts = RecBookReceipt::with(["book", "user", "createdBy"])->get()->sortByDesc("created_at");

        // Admin
        if ($user->role === "admin") {
            $viewVariables = [
                "title" => "Receipt",
                "receipts" => $receipts,
            ];
            return view("pages.dashboard.actors.admin.receipts.index", $viewVariables);
        }

        // Officer
        if ($user->role === "officer") {
            $viewVariables = [
                "title" => "Receipt",
                "receipts" => $receipts,
            ];
            return view("pages.dashboard.actors.officer.receipts.index", $viewVariables);
        }

        // Reader
        if ($user->role === "reader") {
            $viewVariables = [
                "title" => "Receipt",
                "receipts" => $receipts->where("id_user", $user->id_user),
            ];
            return view("pages.dashboard.actors.reader.receipts.index", $viewVariables);
        }

        return view("errors.403");
    }

    public function create()
    {
        $user = Auth::user();
        $users = User::where("role", "reader")->where("flag_active", "Y")->get();
        $books = MasterBook::all();

        // Admin
        if ($user->role === "admin") {
            $viewVariables = [
                "title" => "Create Receipt",
                "users" => $users,
                "books" => $books,
            ];
            return view("pages.dashboard.actors.admin.receipts.create", $viewVariables);
        }

        // Officer
        if ($user->role === "officer") {
            $viewVariables = [
                "title" => "Create Receipt",
                "users" => $users,
                "books" => $books,
            ];
            return view("pages.dashboard.actors.officer.receipts.create", $viewVariables);
        }

        return view("errors.403");
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        // Admin
        if ($user->role === "admin") {
            $credentials = $request->validate($this->rules);
            $credentials["created_by"] = Auth::user()->id_user;
            $book = MasterBook::firstWhere("id_book", $credentials["id_book"]);
            // Check stock
            if ($book->stock < $credentials["amount"])
                return redirect("/dashboard/receipts")->withErrors("Stock is not enough!");

            RecBookReceipt::create($credentials);

            return redirect("/dashboard/receipts")->withSuccess("Receipt created successfully!");
        }

        // Officer
        if ($user->role === "officer") {
            $credentials = $request->validate($this->rules);
            $credentials["created_by"] = Auth::user()->id_user;
            $book = MasterBook::firstWhere("id_book", $credentials["id_book"]);
            // Check stock
            if ($book->stock < $credentials["amount"])
                return redirect("/dashboard/receipts")->withErrors("Stock is not enough!");

            RecBookReceipt::create($credentials);

            return redirect("/dashboard/receipts")->withSuccess("Receipt created successfully!");
        }

        return view("errors.403");
    }

    public function returned(RecBookReceipt $receipt)
    {
        $user = Auth::user();
        $receipt = RecBookReceipt::with(["user"])->firstWhere("id_book_receipt", $receipt->id_book_receipt);

        try {
            $fields = [
                "date_returned" => now(),
                "status" => "returned",
                "updated_by" => $user->id_user,
            ];
            $receipt->update($fields);
            if ($receipt->user->flag_active === "N") $receipt->user->update(["flag_active" => "Y"]);
        } catch (\PDOException | ModelNotFoundException | QueryException | \Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => "An error occured: " . $e->getMessage(),
            ], 500);
        }

        return response()->json([
            "message" => "The receipt has been updated. Book returned.",
        ], 200);
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
            if ($creds["table"] === "all-of-receipts") return (new AllOfReceiptsExport)->download($fileName, $writterType);
        };
        if ($theUser->role == "officer") {
            if ($creds["table"] === "all-of-receipts") return (new AllOfReceiptsExport)->download($fileName, $writterType);
        };

        return view("errors.403");
    }
}
