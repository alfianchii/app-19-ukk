<?php

namespace Database\Seeders;

use App\Models\DTBookGenre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DTBookGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DTBookGenre::insert([
            // Dompet Ayah Sepatu Ibu
            ["id_book" => 1, "id_genre" => 1],
            ["id_book" => 1, "id_genre" => 2],
            ["id_book" => 1, "id_genre" => 3],
            ["id_book" => 1, "id_genre" => 4],
            // Laut Bercerita
            ["id_book" => 2, "id_genre" => 8],
            ["id_book" => 2, "id_genre" => 5],
            ["id_book" => 2, "id_genre" => 6],
            ["id_book" => 2, "id_genre" => 7],
            // I Saw the Same Dream Again
            ["id_book" => 3, "id_genre" => 3],
            ["id_book" => 3, "id_genre" => 4],
            ["id_book" => 3, "id_genre" => 6],
            ["id_book" => 3, "id_genre" => 7],
            // The Midnight Library
            ["id_book" => 4, "id_genre" => 3],
            ["id_book" => 4, "id_genre" => 2],
            ["id_book" => 4, "id_genre" => 8],
            ["id_book" => 4, "id_genre" => 4],
        ]);
    }
}
