<?php

namespace App\Models;

class Author
{
    public static function getAll()
    {
        return [
            [
                'id' => 1,
                'name' => 'Andrea Hirata',
                'photo' => 'andrea-hirata.jpg',
                'bio' => 'Penulis novel Laskar Pelangi'
            ],
            [
                'id' => 2,
                'name' => 'Tere Liye',
                'photo' => 'tere-liye.jpg',
                'bio' => 'Penulis novel dan cerita fiksi'
            ],
            [
                'id' => 3,
                'name' => 'Dee Lestari',
                'photo' => 'dee-lestari.jpg',
                'bio' => 'Penulis novel dan karya sastra'
            ],
            [
                'id' => 4,
                'name' => 'Raditya Dika',
                'photo' => 'raditya-dika.jpg',
                'bio' => 'Penulis buku dan komedian'
            ],
            [
                'id' => 5,
                'name' => 'Ahmad Fuadi',
                'photo' => 'ahmad-fuadi.jpg',
                'bio' => 'Penulis novel Negeri 5 Menara'
            ],
        ];
    }
}