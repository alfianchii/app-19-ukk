<?php

use App\Http\Controllers\Auth\{AuthController, RegisterController};
use App\Http\Controllers\Dashboard\{UserController};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.landing-page.home.index', ["title" => "Home"]);
});

// Authentication
Route::get('/login', [AuthController::class, "index"])->middleware("guest");
Route::post('/login', [AuthController::class, "authenticate"])->name("login")->middleware("guest");
Route::post('/logout', [AuthController::class, "logout"])->middleware("auth");

// Register
Route::get('/register', [RegisterController::class, "index"])->middleware("guest");
Route::post('/register', [RegisterController::class, "register"]);

// Landing Page
// Book
Route::get('/books', function () {
    return view("pages.landing-page.books.index", ["title" => "Books"]);
});
Route::get('/books/1', function () {
    return view("pages.landing-page.books.show", ["title" => "Dompet Ayah Sepatu Ibu"]);
});

// Genre
Route::get('/genres', function () {
    return view("pages.landing-page.genres.index", ["title" => "Genres"]);
});

// Review
Route::get('/reviews', function () {
    return view("pages.landing-page.reviews.index", ["title" => "Reviews"]);
});

// Dashboard
Route::group(['prefix' => "dashboard", "middleware" => ["auth"]], function () {
    Route::get('/', function () {
        return view("pages.dashboard.actors.admin.index", ["title" => "Dashboard", "greeting" => "Good morning"]);
    });

    // Genre
    Route::get('/genres', function () {
        return view("pages.dashboard.actors.admin.genres.index", ["title" => "Genre"]);
    });
    Route::get('/genres/create', function () {
        return view("pages.dashboard.actors.admin.genres.create", ["title" => "Create Genre"]);
    });

    // Book
    Route::get('/books', function () {
        return view("pages.dashboard.actors.admin.books.index", ["title" => "Book"]);
    });
    Route::get('/books/create', function () {
        return view("pages.dashboard.actors.admin.books.create", ["title" => "Create Book"]);
    });

    // Receipt
    Route::get('/receipts', function () {
        return view("pages.dashboard.actors.admin.receipts.index", ["title" => "Receipt"]);
    });
    Route::get('/receipts/create', function () {
        return view("pages.dashboard.actors.admin.receipts.create", ["title" => "Create Receipt"]);
    });

    // Review
    Route::get('/reviews', function () {
        return view("pages.dashboard.actors.admin.reviews.index", ["title" => "Review"]);
    });
    Route::get('/reviews/1/edit', function () {
        return view("pages.dashboard.actors.admin.reviews.edit", ["title" => "Edit Review"]);
    });

    // Wishlist
    Route::get('/wishlists', function () {
        return view("pages.dashboard.actors.admin.wishlists.index", ["title" => "Wishlist"]);
    });

    // User
    Route::resource('/users', UserController::class);
    Route::put('/users/activate/{user:id_user}', [UserController::class, "activate"]);
    Route::put('/users/{user:id_user}/change-password', [UserController::class, "changePassword"]);
    Route::post("/users/export", [UserController::class, "export"]);
});
