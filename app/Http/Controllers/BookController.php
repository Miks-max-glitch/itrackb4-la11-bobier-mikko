<?php

namespace App\Http\Controllers;

use App\Models\Book;            // D1: model imported at the top
use Illuminate\Http\Request;

class BookController extends Controller
{
    // D4: the old books() and saveBooks() helpers are gone

    public function index(Request $request)
    {
        $genre = $request->query('genre', 'all');
        $year = $request->query('year', 'all');

        // D2: read rows from the table instead of the JSON array
        $query = Book::query();

        if ($genre !== 'all') {
            $query->where('genre', $genre);
        }

        if ($year !== 'all') {
            $query->where('year', $year);
        }

        $books = $query->get();

        return view('books.index', [
            'books' => $books,
            'genre' => $genre,
            'year' => $year,
        ]);

    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|max:100',
            'author'      => 'required|max:100',
            'year'        => 'required|digits:4|integer|min:1000|max:' . date('Y'),
            'genre'       => 'required|in:Classical,Mystery,Historical',
            'is_featured' => 'sometimes|boolean',
        ]);

        // an unchecked checkbox sends nothing, so this fills in a real false
        $validated['is_featured'] = $request->boolean('is_featured');

        Book::create($validated);   // saves to the database, no JSON writing

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