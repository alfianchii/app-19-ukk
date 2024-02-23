<?php

namespace Database\Seeders;

use App\Models\HistoryBookWishlist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HistoryBookWishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HistoryBookWishlist::insert([
            // Book 1
            ["id_book" => 1, "id_user" => 1, "created_at" => now()],
            ["id_book" => 1, "id_user" => 2, "created_at" => now()],
            ["id_book" => 1, "id_user" => 3, "created_at" => now()],
            // Book 2
            ["id_book" => 2, "id_user" => 2, "created_at" => now()],
            ["id_book" => 2, "id_user" => 3, "created_at" => now()],
            // Book 3
            ["id_book" => 3, "id_user" => 1, "created_at" => now()],
            ["id_book" => 3, "id_user" => 3, "created_at" => now()],
            // Book 4
            ["id_book" => 4, "id_user" => 1, "created_at" => now()],
            ["id_book" => 4, "id_user" => 2, "created_at" => now()],
        ]);
    }
}