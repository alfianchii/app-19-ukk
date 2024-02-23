<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\MasterGenre;

class GenreController extends Controller
{
    public function index()
    {
        $genres = MasterGenre::with(["books"])->paginate(4);

        $viewVariables = [
            "title" => "Genre",
            "genres" => $genres,
        ];
        return view('pages.landing-page.genres.index', $viewVariables);
    }
}
