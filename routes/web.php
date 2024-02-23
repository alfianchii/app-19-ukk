<?php

use App\Http\Controllers\Home\{HomeController, BookController, GenreController};
use App\Http\Controllers\Auth\{AuthController, RegisterController};
use App\Http\Controllers\Dashboard\{DashboardController, HistoryBookWishlistController, MasterBookController, MasterGenreController, RecBookReceiptController, RecBookReviewController, UserController};
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

Route::get('/', [HomeController::class, "index"]);

// Authentication
Route::get('/login', [AuthController::class, "index"])->middleware("guest");
Route::post('/login', [AuthController::class, "authenticate"])->name("login")->middleware("guest");
Route::post('/logout', [AuthController::class, "logout"])->middleware("auth");

// Register
Route::get('/register', [RegisterController::class, "index"])->middleware("guest");
Route::post('/register', [RegisterController::class, "register"]);

// Landing Page
// Book
Route::get('/books', [BookController::class, "index"]);
Route::get('/books/{book:id_book}', [BookController::class, "show"]);
Route::post('/books/{book:id_book}/reviewed', [BookController::class, "reviewed"]);

// Wishlist
Route::post('/books/{book:id_book}/wishlist', [BookController::class, "wishlist"]);

// Genre
Route::get('/genres', [GenreController::class, "index"]);

// Dashboard
Route::group(['prefix' => "dashboard", "middleware" => ["auth"]], function () {
    Route::get('/', [DashboardController::class, "index"]);

    // Genre
    Route::resource('/genres', MasterGenreController::class)->except(["show"]);
    Route::put('/genres/activate/{genre:id_genre}', [MasterGenreController::class, "activate"]);
    Route::post("/genres/export", [MasterGenreController::class, "export"]);

    // Book
    Route::resource('/books', MasterBookController::class)->except(["show"]);
    Route::post("/books/export", [MasterBookController::class, "export"]);

    // Receipt
    Route::resource('/receipts', RecBookReceiptController::class)->except(["show", "update", "edit"]);
    Route::put("/receipts/returned/{receipt:id_book_receipt}", [RecBookReceiptController::class, "returned"]);
    Route::post("/receipts/export", [RecBookReceiptController::class, "export"]);

    // Review
    Route::resource('/reviews', RecBookReviewController::class);
    Route::delete('/reviews/destroy-your-review-photo/{review:id_book_review}', [RecBookReviewController::class, "destroyYourReviewPhoto"]);
    Route::post("/reviews/export", [RecBookReviewController::class, "export"]);

    // Wishlist
    Route::get('/wishlists', [HistoryBookWishlistController::class, "index"]);
    Route::delete('/wishlists/{wishlist:id_book_wishlist}', [HistoryBookWishlistController::class, "destroy"]);
    Route::post("/wishlists/export", [HistoryBookWishlistController::class, "export"]);

    // User
    Route::resource('/users', UserController::class);
    Route::put('/users/activate/{user:id_user}', [UserController::class, "activate"]);
    Route::put('/users/{user:id_user}/change-password', [UserController::class, "changePassword"]);
    Route::delete('/users/destroy-profile-picture/{user:id_user}', [UserController::class, "destroyProfilePicture"]);
    Route::post("/users/export", [UserController::class, "export"]);
});
