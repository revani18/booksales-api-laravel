<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'title' => 'Laskar Pelangi',
                'description' => 'Novel tentang perjuangan anak-anak Belitung.',
                'price' => 75000,
                'stock' => 25,
                'cover_photo' => 'laskar_pelangi.jpg',
                'genre_id' => 1,
                'author_id' => 1,
            ],
            [
                'title' => 'Bumi',
                'description' => 'Novel petualangan fantasi.',
                'price' => 85000,
                'stock' => 20,
                'cover_photo' => 'bumi.jpg',
                'genre_id' => 3,
                'author_id' => 2,
            ],
            [
                'title' => 'Perahu Kertas',
                'description' => 'Novel tentang mimpi dan perjalanan hidup.',
                'price' => 70000,
                'stock' => 18,
                'cover_photo' => 'perahu_kertas.jpg',
                'genre_id' => 2,
                'author_id' => 3,
            ],
            [
                'title' => 'Bumi Manusia',
                'description' => 'Novel berlatar masa kolonial.',
                'price' => 90000,
                'stock' => 15,
                'cover_photo' => 'bumi_manusia.jpg',
                'genre_id' => 1,
                'author_id' => 4,
            ],
            [
                'title' => 'Saman',
                'description' => 'Novel sastra Indonesia kontemporer.',
                'price' => 68000,
                'stock' => 12,
                'cover_photo' => 'saman.jpg',
                'genre_id' => 2,
                'author_id' => 5,
            ],
        ];

        foreach ($books as $book) {
            Book::firstOrCreate(
                ['title' => $book['title']],
                $book
            );
        }
    }
}
