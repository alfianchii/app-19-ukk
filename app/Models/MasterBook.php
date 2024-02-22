<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterBook extends Model
{
    use HasFactory;

    protected $table = "mst_books";
    protected $primaryKey = "id_book";
    protected $guarded = ["id_book"];

    public function createdBy()
    {
        return $this->belongsTo(User::class, "created_by", "id_user");
    }

    public function genres()
    {
        return $this->belongsToMany(MasterGenre::class, 'dt_book_genres', 'id_book', 'id_genre');
    }

    public function wishlists()
    {
        return $this->hasMany(HistoryBookWishlist::class, 'id_book', 'id_book');
    }

    public function reviews()
    {
        return $this->hasMany(RecBookReview::class, 'id_book', 'id_book');
    }
}
