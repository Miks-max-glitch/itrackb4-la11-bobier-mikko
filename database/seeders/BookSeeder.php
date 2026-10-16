<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{

    public function run(): void
    {
        Book::create(['title' => 'The Lord of the Rings', 'author' => 'J.R.R. Tolkien', 'year' => 1950, 'genre' => 'Classical', 'is_featured' => true]);
        Book::create(['title' => 'Spiderman', 'author' => 'Lhorenz', 'year' => 1950, 'genre' => 'Mystery', 'is_featured' => false]);
        Book::create(['title' => 'The Return of the King', 'author' => 'Khaliq', 'year' => 1978, 'genre' => 'Historical', 'is_featured' => true]);
        Book::create(['title' => 'The Hobbit', 'author' => 'Justin', 'year' => 1954, 'genre' => 'Classical', 'is_featured' => true]);
        Book::create(['title' => 'Programmer', 'author' => 'Lhorenz', 'year' => 1978, 'genre' => 'Historical', 'is_featured' => false]);
    }
}