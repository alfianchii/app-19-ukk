<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryBookWishlist extends Model
{
    use HasFactory;

    protected $table = "history_book_wishlists";
    protected $primaryKey = "id_book_wishlist";
    protected $guarded = ["id_book_wishlist"];

    public function book()
    {
        return $this->belongsTo(MasterBook::class, "id_book", "id_book");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "id_user", "id_user");
    }
}
