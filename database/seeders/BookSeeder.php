<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{

    public function run(): void
    {
        // 1. lookup rows FIRST, each held in a variable
        $a = Genre::create(['name' => 'Classical']);
        $b = Genre::create(['name' => 'Mystery']);
        $c = Genre::create(['name' => 'Historical']);

            // 2. books, each pointing at a real genre id
        Book::create([
        'title'       => 'The Lion, the Witch and the Wardrobe',
        'author'      => 'C. S. Lewis',
        'year'        => 1950,
        'genre_id'    => $a->id,      // Classical
        'is_featured' => true,
    ]);
        Book::create([
            'title'       => 'Destination Unknown',
            'author'      => 'Agatha Christie',
            'year'        => 1954,
            'genre_id'    => $b->id,      // Mystery
            'is_featured' => false,
    ]);
        Book::create([
            'title'       => 'Chesapeake',
            'author'      => 'James A. Michener',
            'year'        => 1978,
            'genre_id'    => $c->id,      // Historical
            'is_featured' => false,
    ]);
        Book::create([
            'title'       => 'The Blind Assassin',
            'author'      => 'Margaret Atwood',
            'year'        => 2000,
            'genre_id'    => $c->id,      // Historical
            'is_featured' => false,
    ]);
        Book::create([
            'title'       => 'Set in Darkness',
            'author'      => 'Ian Rankin',
            'year'        => 2000,
            'genre_id'    => $b->id,      // Mystery
            'is_featured' => false,
        ]);
    }
}