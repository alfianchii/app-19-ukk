<?php

namespace Database\Seeders;

use App\Models\RecBookReview;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecBookReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RecBookReview::insert([
            [
                "id_book" => 1,
                "id_user" => 1,
                "body" => '"Dompet Ayah Sepatu Ibu" is a thought-provoking puzzle that keeps readers guessing until the very end. With its intricate plot twists and enigmatic characters, this book is a captivating rollercoaster ride through the depths of space and time. While some may find the narrative challenging to follow, those who persevere will be rewarded with a profound meditation on the nature of reality.',
            ],
            [
                "id_book" => 1,
                "id_user" => 2,
                "body" => 'While "Dompet Ayah Sepatu Ibu" promises an intriguing exploration of time and eternity, its execution falls short. The plot is convoluted, with too many characters and subplots vying for attention. The philosophical musings feel forced at times, detracting from the overall coherence of the narrative. Despite moments of brilliance, the book ultimately fails to deliver a satisfying resolution to its central mysteries.',
            ],
            [
                "id_book" => 1,
                "id_user" => 3,
                "body" => "Prepare to have your mind blown by 'Dompet Ayah Sepatu Ibu'. This book seamlessly blends elements of science fiction, fantasy, and metaphysics to create a truly unique reading experience. The author's imagination knows no bounds, crafting a world where time is fluid and reality is mutable. With its vivid imagery and captivating storytelling, this book will leave you pondering the nature of existence long after you've turned the final page.",
            ],
        ]);
    }
}