<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //protected $fillable = ['title', 'author', 'year', 'genre', 'is_featured'];

    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
            'year'        => 'integer',
        ];
    }
}