<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BookController extends Controller
{
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

    // B1: the model arrives bound, no findOrFail
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    // C1: passes the record and the lookup rows
    public function edit(Book $book)
    {
        $genres = Genre::all();
        return view('books.edit', compact('book', 'genres'));
    }

    // D1 to D3: validate, update, redirect
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title'    => 'required|max:100',
            'author'   => 'required|max:100',
            'year'     => 'required|digits:4|integer|min:1000|max:' . date('Y'),
            'genre_id' => 'required|exists:genres,id',
        ]);

        $book->update($validated);

        return redirect()
            ->route('books.index')
            ->with('success', 'Book updated.');
    }

    // E3: remove the record, then go back to the list
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Book deleted.');
    }

    public function feature()
    {
        // null if no book is featured; your feature.blade.php already handles that
        $book = Book::where('is_featured', true)->first();

        return view('books.feature', ['book' => $book]);
    }
}