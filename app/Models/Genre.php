<?php

namespace App\Models;

class Genre
{
    public static function getAll()
    {
        return [
            [
                'id' => 1,
                'name' => 'Fiksi',
                'description' => 'Cerita rekaan dan imajinasi'
            ],
            [
                'id' => 2,
                'name' => 'Romance',
                'description' => 'Cerita tentang percintaan'
            ],
            [
                'id' => 3,
                'name' => 'Misteri',
                'description' => 'Cerita dengan teka-teki'
            ],
            [
                'id' => 4,
                'name' => 'Pendidikan',
                'description' => 'Buku untuk pembelajaran'
            ],
            [
                'id' => 5,
                'name' => 'Pengembangan Diri',
                'description' => 'Buku untuk meningkatkan kemampuan diri'
            ],
        ];
    }
}