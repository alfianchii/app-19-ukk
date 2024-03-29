<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\Book\Wishlist\AllOfWishlistsExport;
use App\Exports\Book\Wishlist\YourWishlistsExport;
use App\Http\Controllers\Controller;
use App\Models\HistoryBookWishlist;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HistoryBookWishlistController extends Controller
{
    public function index()
    {
        $theUser = Auth::user();
        // Admin
        if ($theUser->role === "admin") {
            $wishlists = HistoryBookWishlist::with(["user", "book.genres"])->get();
            $yourWishlists = HistoryBookWishlist::with(["user", "book.genres"])->where("id_user", $theUser->id_user)->get();

            $viewVariables = [
                "title" => "Wishlist",
                "wishlists" => $wishlists,
                "yourWishlists" => $yourWishlists,
            ];
            return view("pages.dashboard.actors.admin.wishlists.index", $viewVariables);
        }

        // Officer
        if ($theUser->role === "officer") {
            $wishlists = HistoryBookWishlist::with(["user", "book.genres"])->get();
            $yourWishlists = HistoryBookWishlist::with(["user", "book.genres"])->where("id_user", $theUser->id_user)->get();

            $viewVariables = [
                "title" => "Wishlist",
                "wishlists" => $wishlists,
                "yourWishlists" => $yourWishlists,
            ];
            return view("pages.dashboard.actors.officer.wishlists.index", $viewVariables);
        }

        // Reader
        if ($theUser->role === "reader") {
            $yourWishlists = HistoryBookWishlist::with(["user", "book.genres"])->where("id_user", $theUser->id_user)->get();

            $viewVariables = [
                "title" => "Wishlist",
                "yourWishlists" => $yourWishlists,
            ];
            return view("pages.dashboard.actors.reader.wishlists.index", $viewVariables);
        }

        return view("errors.403");
    }

    public function destroy(HistoryBookWishlist $wishlist)
    {
        $theUser = Auth::user();

        try {
            if ($wishlist->id_user !== $theUser->id_user) throw new \Exception("You cannot remove other's wishlist.");
            if (!HistoryBookWishlist::destroy($wishlist->id_book_wishlist)) throw new \Exception("Error removing wishlist.");
        } catch (\PDOException | ModelNotFoundException | QueryException | \Exception $e) {
            return $this->responseJsonMessage($e->getMessage(), 500);
        } catch (\Throwable $e) {
            return $this->responseJsonMessage("An error occurred: " . $e->getMessage(), 500);
        }

        return $this->responseJsonMessage("The wishlist has been removed.");
    }

    public function export(Request $request)
    {
        $theUser = Auth::user();

        $validator = Validator::make($request->all(), $this->exportRules);
        if ($validator->fails()) return view("errors.403");
        $creds = $validator->validate();

        $fileName = now()->format("Y_m_d_His") . "." . strtolower($creds["type"]);
        $writterType = constant("\Maatwebsite\Excel\Excel::" . $creds["type"]);

        $theUser = Auth::user();
        if ($theUser->role == "admin") {
            if ($creds["table"] === "all-of-wishlists") return (new AllOfWishlistsExport)->download($fileName, $writterType);
        };
        if ($theUser->role == "officer") {
            if ($creds["table"] === "all-of-wishlists") return (new AllOfWishlistsExport)->download($fileName, $writterType);
        };
        if ($creds["table"] === "your-wishlists") return (new YourWishlistsExport)->forIdUser($theUser->id_user)->download($fileName, $writterType);

        return view("errors.403");
    }
}