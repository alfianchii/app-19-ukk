<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecBookReview extends Model
{
    use HasFactory;

    protected $table = "rec_book_reviews";
    protected $primaryKey = "id_book_review";
    protected $guarded = ["id_book_review"];
}
