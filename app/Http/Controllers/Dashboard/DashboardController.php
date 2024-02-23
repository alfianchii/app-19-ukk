<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\HistoryBookWishlist;
use App\Models\MasterGenre;
use App\Models\RecBookReceipt;
use App\Models\RecBookReview;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // CORES
    public function index()
    {
        $theUser = Auth::user();

        $greeting = "";
        $time = now()->hour;
        if ($time >= 6 && $time <= 11) $greeting = "Good morning";
        else if ($time >= 12 && $time <= 14) $greeting = "Good afternoon";
        else if ($time >= 15 && $time <= 18) $greeting = "Good evening";
        else $greeting = "Good night";

        // Admin
        if ($theUser->role === "admin") {
            $usersCount = User::all()->count();
            $inactiveUsersCount = User::all()->where('flag_active', "N")->count();
            $officersCount = User::all()->where('role', "officer")->count();
            $readersCount = User::all()->where('role', "reader")->count();
            $receiptsCount = RecBookReceipt::all()->count();
            $reviewsCount = RecBookReview::all()->count();
            $wishlistsCount = HistoryBookWishlist::all()->count();
            $genresCount = MasterGenre::all()->count();

            $receipts = RecBookReceipt::with(["user"])->latest()->limit(5)->get();
            $reviews = RecBookReview::with(["user"])->latest()->paginate(3);

            $viewVariables = [
                "title" => "Dashboard",
                "greeting" => $greeting,
                "usersCount" => $usersCount,
                "inactiveUsersCount" => $inactiveUsersCount,
                "officersCount" => $officersCount,
                "readersCount" => $readersCount,
                "receiptsCount" => $receiptsCount,
                "reviewsCount" => $reviewsCount,
                "wishlistsCount" => $wishlistsCount,
                "genresCount" => $genresCount,
                "receipts" => $receipts,
                "reviews" => $reviews,
            ];
            return view("pages.dashboard.actors.admin.index", $viewVariables);
        }

        // Officer
        if ($theUser->role === "officer") {
            $officersCount = User::all()->where('role', "officer")->count();
            $readersCount = User::all()->where('role', "reader")->count();
            $receiptsCount = RecBookReceipt::all()->count();
            $reviewsCount = RecBookReview::all()->count();

            $receipts = RecBookReceipt::with(["user"])->latest()->limit(3)->get();
            $reviews = RecBookReview::with(["user"])->latest()->paginate(3);

            $viewVariables = [
                "title" => "Dashboard",
                "greeting" => $greeting,
                "officersCount" => $officersCount,
                "readersCount" => $readersCount,
                "receiptsCount" => $receiptsCount,
                "reviewsCount" => $reviewsCount,
                "receipts" => $receipts,
                "reviews" => $reviews,
            ];
            return view("pages.dashboard.actors.officer.index", $viewVariables);
        }

        // Reader
        if ($theUser->role === "reader") {
            $receiptsCount = RecBookReceipt::where("id_user", $theUser->id_user)->count();
            $reviewsCount = RecBookReview::where("id_user", $theUser->id_user)->count();
            $wishlistsCount = HistoryBookWishlist::where("id_user", $theUser->id_user)->count();

            $receipts = RecBookReceipt::with(["user"])->where("id_user", $theUser->id_user)->latest()->limit(3)->get();
            $reviews = RecBookReview::with(["user"])->where('id_user', $theUser->id_user)->latest()->paginate(3);

            $viewVariables = [
                "title" => "Dashboard",
                "greeting" => $greeting,
                "receiptsCount" => $receiptsCount,
                "reviewsCount" => $reviewsCount,
                "wishlistsCount" => $wishlistsCount,
                "receipts" => $receipts,
                "reviews" => $reviews,
            ];
            return view("pages.dashboard.actors.reader.index", $viewVariables);
        }
    }
}