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

    public function createdBy()
    {
        return $this->belongsTo(User::class, "created_by", "id_user");
    }

    public function book()
    {
        return $this->belongsTo(MasterBook::class, "id_book", "id_book");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "id_user", "id_user");
    }
}
