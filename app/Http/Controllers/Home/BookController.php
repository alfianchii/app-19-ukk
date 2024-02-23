<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HistoryBookWishlist;
use App\Models\MasterBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    // PROPERTIES
    protected const REQUEST = ["search", "author", "title", "year_published", "publisher", "genre"];


    // CORES
    public function index(Request $request)
    {
        $data = $request->only(self::REQUEST);
        $books = MasterBook::with(["genres", "wishlists"])->filter($data)->paginate(3)->withQueryString();

        $viewVariables = [
            "title" => "Book",
            "books" => $books,
        ];
        return view('pages.landing-page.books.index', $viewVariables);
    }

    public function show(MasterBook $book)
    {
        $book = MasterBook::with(['reviews.user'])->firstWhere("id_book", $book->id_book);
        $reviews = $book->reviews()->orderByDesc("created_at")->paginate(3);

        $viewVariables = [
            "title" => $book->title,
            "book" => $book,
            "reviews" => $reviews,
        ];
        return view('pages.landing-page.books.show', $viewVariables);
    }

    public function wishlist(MasterBook $book, Request $request)
    {
        $theUser = Auth::user();

        $credentials = $request->validate(["id_book_wishlist" => "nullable"]);
        $message = '';
        if (array_key_exists("id_book_wishlist", $credentials)) {
            $wishlist = HistoryBookWishlist::firstWhere("id_book_wishlist", $credentials["id_book_wishlist"]);
            HistoryBookWishlist::destroy($wishlist->id_book_wishlist);
            $message = "Book has been removed from your wishlist!";
        } else {
            $fields = [
                "id_user" => $theUser->id_user,
                "id_book" => $book->id_book,
            ];
            HistoryBookWishlist::create($fields);
            $message = "Book has been added to your wishlist!";
        }

        return back()->withSuccess($message);
    }

    public function reviewed(MasterBook $book, Request $request)
    {
        $user = Auth::user();

        $credentials = $request->validate([
            "body" => ["required"],
            "photo" => ["nullable", "image", "file", "max:1024"],
        ]);
        $credentials["id_user"] = $user->id_user;

        if ($request->has("photo")) $credentials["photo"] = $credentials["photo"]->store("book-reviews");

        $book->reviews()->create($credentials);

        return redirect("/books/{$book->id_book}")->withSuccess("Your review has been posted!");
    }
}