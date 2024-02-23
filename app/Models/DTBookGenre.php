<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DTBookGenre extends Model
{
    use HasFactory;

    protected $table = "dt_book_genres";
    protected $primaryKey = "id_book_genre";
    protected $guarded = ["id_book_genre"];

    public function genre()
    {
        return $this->belongsTo(MasterGenre::class, "id_genre", "id_genre");
    }

    public function book()
    {
        return $this->belongsTo(MasterBook::class, "id_book", "id_book");
    }
}
