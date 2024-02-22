<?php

namespace Database\Seeders;

use App\Models\MasterBook;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MasterBook::insert([
            [
                "id_book" => 1,
                "title" => "Dompet Ayah Sepatu Ibu",
                "author" => "J. S. Khairen",
                "publisher" => "Gramedia Widia Sarana Indonesia",
                "year_published" => "2023",
                "synopsis" => "The world is evil and you lost? Look at the palm of your hand. Father always forged that hand to not give up. Mom never stops holding that hand to pray. Rise up to take a step. This is the story of a father and mother, whose love was born even before you were born, whose love grew even before you grew. This is a story of fathers and mothers, whose tears can light a fire, whose tears can put out a fire. The hottest fire is lit when mom and dad cry in disappointment. The hottest fire is extinguished by mom and dad's tears of struggle. So, always remember home.",
                "stock" => 3,
                "created_by" => 1,
                "created_at" => now(),
            ],
            [
                "id_book" => 2,
                "title" => "Laut Bercerita",
                "author" => "Leila S. Chudori",
                "publisher" => "Penerbit KPG",
                "year_published" => "2017",
                "synopsis" => "At dusk, in a flat in Jakarta, a student named Biru Laut was ambushed by four unknown men. Together with his friends, Daniel Tumbuan, Sunu Dyantoro, Alex Perazon, he was taken to an unknown place. For months they were held captive, interrogated, beaten, kicked, hung and electrocuted to answer one important question: who was behind the activist and student movements at the time.",
                "stock" => 5,
                "created_by" => 1,
                "created_at" => now(),
            ],
            [
                "id_book" => 3,
                "title" => "I Saw the Same Dream Again",
                "author" => "Yoru Sumino",
                "publisher" => "Penerbit Haru",
                "year_published" => "2016",
                "synopsis" => "Koyanagi Nanoka is an elementary school student who considers herself smart.She gets a school assignment to think about what happiness is.While thinking about the assignment with her classmates, she meets a high school student who likes to cut his veins, a woman who is trapped in her own life, and a grandmother who seems to be living peacefully.All of them have their own regrets.What is happiness?Can they fix the past?",
                "stock" => 10,
                "created_by" => 1,
                "created_at" => now(),
            ],
            [
                "id_book" => 4,
                "title" => "The Midnight Library",
                "author" => "Matt Haig",
                "publisher" => "Penguin Books",
                "year_published" => "2020",
                "synopsis" => "Between life and death there is a library, and within that library, the shelves go on forever. Every book provides a chance to try another life you could have lived. To see how things would be if you had made other choices . . . Would you have done anything different, if you had the chance to undo your regrets? A novel about all the choices that go into a life well lived.",
                "stock" => 6,
                "created_by" => 1,
                "created_at" => now(),
            ],
        ]);
    }
}