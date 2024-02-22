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
}
