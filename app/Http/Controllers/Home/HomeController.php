<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\RecBookReview;

class HomeController extends Controller
{
    // CORES
    public function index()
    {
        $reviews = RecBookReview::with(["user", "book"])->latest()->limit(3)->get();

        $viewVariables = [
            "title" => "Home",
            "reviews" => $reviews,
        ];
        return view('pages.landing-page.home.index', $viewVariables);
    }
}
