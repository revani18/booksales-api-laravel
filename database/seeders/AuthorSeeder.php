<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = [
            [
                'name' => 'Andrea Hirata',
                'photo' => 'andrea_hirata.jpg',
                'bio' => 'Penulis novel Laskar Pelangi.'
            ],
            [
                'name' => 'Tere Liye',
                'photo' => 'tere_liye.jpg',
                'bio' => 'Penulis novel populer Indonesia.'
            ],
            [
                'name' => 'Dee Lestari',
                'photo' => 'dee_lestari.jpg',
                'bio' => 'Penulis dan penyanyi Indonesia.'
            ],
            [
                'name' => 'Pramoedya Ananta Toer',
                'photo' => 'pramoedya.jpg',
                'bio' => 'Penulis karya sastra dan sejarah Indonesia.'
            ],
            [
                'name' => 'Ayu Utami',
                'photo' => 'ayu_utami.jpg',
                'bio' => 'Penulis novel dan jurnalis Indonesia.'
            ],
        ];

        foreach ($authors as $author) {
            Author::create($author);
        }
    }
}
