<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterGenre extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "mst_genres";
    protected $primaryKey = "id_genre";
    protected $guarded = ["id_genre"];

    public function createdBy()
    {
        return $this->belongsTo(User::class, "created_by", "id_user");
    }

    public function books()
    {
        return $this->belongsToMany(MasterGenre::class, 'dt_book_genres', 'id_genre', 'id_book');
    }

    public function scopeFilter($query, $filters)
    {
        // SEARCH: GENRE
        $query->when(
            $filters["search"] ?? false,
            fn ($query, $search) =>
            $query->whereHas(
                "books",
                fn ($query) => $query->where('mst_genres.name', $search)
            )
                ->get()
        );
    }
}
