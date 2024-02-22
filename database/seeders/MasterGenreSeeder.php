<?php

namespace Database\Seeders;

use App\Models\MasterGenre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MasterGenre::insert([
            [
                "name" => "Action",
                "description" => "Action films usually include high energy, big-budget physical stunts and chases, possibly with rescues, battles, fights, escapes, destructive crises, etc.",
                "created_by" => 1,
                "flag_active" => "Y",
                "created_at" => now(),
            ],
            [
                "name" => "Adventure",
                "description" => "Adventure films are usually exciting stories, with new experiences or exotic locales, very similar to or often paired with the action film genre.",
                "created_by" => 1,
                "flag_active" => "Y",
                "created_at" => now(),
            ],
            [
                "name" => "Comedy",
                "description" => "Comedy is a story that tells about a series of funny, or comical events, intended to make the audience laugh. It is a very open genre, and thus crosses over with many other genres on a regular basis.",
                "created_by" => 1,
                "flag_active" => "Y",
                "created_at" => now(),
            ],
            [
                "name" => "Drama",
                "description" => "Drama is a genre of narrative fiction (or semi-fiction) intended to be more serious than humorous in tone, focusing on in-depth development of realistic characters who must deal with realistic emotional struggles.",
                "created_by" => 1,
                "flag_active" => "Y",
                "created_at" => now(),
            ],
            [
                "name" => "Horror",
                "description" => "Horror is a genre of speculative fiction which is intended to frighten, scare, disgust, or startle its readers by inducing feelings of horror and terror. Literary historian J. A.",
                "created_by" => 1,
                "flag_active" => "Y",
                "created_at" => now(),
            ],
            [
                "name" => "Mystery",
                "description" => "Mystery fiction is a genre of fiction usually involving a mysterious death or a crime to be solved. In a closed circle of suspects, each suspect must have a credible motive and a reasonable opportunity for committing the crime.",
                "created_by" => 1,
                "flag_active" => "Y",
                "created_at" => now(),
            ],
            [
                "name" => "Romance",
                "description" => "The romance genre is about love and emotion. It is about relationships, family, and friendship. It is about the way people grow and change. It is about the way life changes people. It is about the way love changes people. It is about the way love changes the world.",
                "created_by" => 1,
                "flag_active" => "Y",
                "created_at" => now(),
            ],
            [
                "name" => "Science Fiction",
                "description" => "Science fiction is a genre of speculative fiction that typically deals with imaginative and futuristic concepts such as advanced science and technology, space exploration, time travel, parallel universes, and extraterrestrial life.",
                "created_by" => 1,
                "flag_active" => "Y",
                "created_at" => now(),
            ],
            [
                "name" => "Thriller",
                "description" => "Thriller is a broad genre of literature, film, and television programming that uses suspense, tension, and excitement as its main elements. Thrillers heavily stimulate the viewer's moods, giving them a high level of anticipation, ultra-heightened expectation, uncertainty, surprise, anxiety, and terror.",
                "created_by" => 1,
                "flag_active" => "Y",
                "created_at" => now(),
            ],
            [
                "name" => "Western",
                "description" => "Western is a genre of various arts which tell stories set primarily in the latter half of the 19th century in the American Old West, often centering on the life of a nomadic cowboy or gunfighter armed with a revolver and a rifle who rides a horse. ",
                "created_by" => 1,
                "flag_active" => "Y",
                "created_at" => now(),
            ],
            [
                "name" => "Fiction",
                "description" => "Fiction is a form of any work designed to entertain, and provoke emotional reactions. It can be based on real events or people, but the story is not real. It is a product of the author's imagination. It can be a novel, a novella, a short story, or a play.",
                "created_by" => 1,
                "flag_active" => "Y",
                "created_at" => now(),
            ],
            [
                "name" => "Non-Fiction",
                "description" => "Non-fiction is a form of any narrative, account, or other communicative work whose assertions and descriptions are understood to be fact. This presentation may be accurate or not; that is, it can give either a true or a false account of the subject in question.",
                "created_by" => 1,
                "flag_active" => "Y",
                "created_at" => now(),
            ],
            [
                "name" => "Biography",
                "description" => "A biography, or simply bio, is a detailed description of a person's life. It involves more than just the basic facts like education, work, relationships, and death; it portrays a person's experience of these life events.",
                "created_by" => 1,
                "flag_active" => "Y",
                "created_at" => now(),
            ],
            [
                "name" => "Autobiography",
                "description" => "An autobiography is a self-written account of the life of oneself. The word 'autobiography' was first used deprecatingly by William Taylor in 1797 in the English periodical The Monthly Review, when he suggested the word as a hybrid, but condemned it as 'pedantic'.",
                "created_by" => 1,
                "flag_active" => "Y",
                "created_at" => now(),
            ],
            [
                "name" => "Memoir",
                "description" => "A memoir is a collection of memories that an individual writes about moments or events, both public or private, that took place in the subject's life. The assertions made in the work are understood to be factual.",
                "created_by" => 1,
                "flag_active" => "Y",
                "created_at" => now(),
            ],
            [
                "name" => "Self-Help",
                "description" => "Self-help or self-improvement is a self-guided improvement—economically, intellectually, or emotionally—often with a substantial psychological basis. Many different self-help group programs exist, each with its own focus and techniques.",
                "created_by" => 1,
                "flag_active" => "Y",
                "created_at" => now(),
            ],
        ]);
    }
}