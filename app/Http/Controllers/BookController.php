<?php

namespace App\Http\Controllers;

use App\Models\Book;            // D1: model imported at the top
use App\Models\Genre;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // D4: the old books() and saveBooks() helpers are gone

    public function index(Request $request)
    {
        $genres = Genre::all();      // moved up so it is NOT counted
        DB::enableQueryLog();

        $genreId = $request->query('genre_id', 'all');
        $year = $request->query('year', 'all');


        $query = Book::with('genre');

        if ($genreId !== 'all') {
            $query->where('genre_id', $genreId);
        }

        if ($year !== 'all') {
            $query->where('year', $year);
        }

        $books = $query->get();

        return view('books.index', [
            'books' => $books,
            'genres' => $genres,
            'genreId' => $genreId,
            'year' => $year,
        ]);

    }

    public function create()
    {
        $genres = Genre::all();
        return view('books.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|max:100',
            'author'      => 'required|max:100',
            'year'        => 'required|digits:4|integer|min:1000|max:' . date('Y'),
            'genre_id'    => 'required|exists:genres,id',
            'is_featured' => 'sometimes|boolean',
        ]);

        $validated['is_featured'] = $request->boolean('is_featured');

        Book::create($validated);

        return redirect()
            ->route('books.index')
            ->with('success', 'Book added successfully.');
    }

    public function show(string $id)
    {
        // D3: findOrFail replaces the isset() check and abort(404)
        $book = Book::findOrFail($id);

        return view('books.show', ['book' => $book]);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    public function feature()
    {
        // null if no book is featured; your feature.blade.php already handles that
        $book = Book::where('is_featured', true)->first();

        return view('books.feature', ['book' => $book]);
    }
    
}