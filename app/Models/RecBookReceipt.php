<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecBookReceipt extends Model
{
    use HasFactory;

    protected $table = "rec_book_receipts";
    protected $primaryKey = "id_book_receipt";
    protected $guarded = ["id_book_receipt"];
    protected $casts = [
        'from_time' => 'date',
        'to_time' => 'date',
        'date_returned' => 'date',
    ];

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
