@extends('layouts.app')

@section('title', 'Book Recommendations')

@section('content')

    <h2 class="mb-3">List of Recommendations</h2>

    <a href="{{ route('books.create') }}" class="btn btn-success mb-3">+ Add Book</a>

    <div class="alert alert-light border d-flex justify-content-between align-items-center mb-3">
        <div>
            <span class="text-muted">Active filters:</span>
            <span class="badge bg-primary">Genre: {{ $genre }}</span>
            <span class="badge bg-primary">Year: {{ $year }}</span>
        </div>
        <a href="{{ route('books.index') }}" class="btn btn-sm btn-outline-secondary">Clear all</a>
    </div>

    <div class="mb-3">
        <strong class="me-2">Genre:</strong>
        <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('books.index', ['genre' => 'all', 'year' => $year]) }}"
               class="btn {{ $genre === 'all' ? 'btn-primary' : 'btn-outline-primary' }}">All</a>
            <a href="{{ route('books.index', ['genre' => 'Classical', 'year' => $year]) }}"
               class="btn {{ $genre === 'Classical' ? 'btn-primary' : 'btn-outline-primary' }}">Classical</a>
            <a href="{{ route('books.index', ['genre' => 'Mystery', 'year' => $year]) }}"
               class="btn {{ $genre === 'Mystery' ? 'btn-primary' : 'btn-outline-primary' }}">Mystery</a>
            <a href="{{ route('books.index', ['genre' => 'Historical', 'year' => $year]) }}"
               class="btn {{ $genre === 'Historical' ? 'btn-primary' : 'btn-outline-primary' }}">Historical</a>
        </div>
    </div>

    <div class="mb-4">
        <strong class="me-2">Year:</strong>
        <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('books.index', ['genre' => $genre, 'year' => 'all']) }}"
               class="btn {{ $year === 'all' ? 'btn-primary' : 'btn-outline-primary' }}">All</a>
            <a href="{{ route('books.index', ['genre' => $genre, 'year' => '1950']) }}"
               class="btn {{ $year === '1950' ? 'btn-primary' : 'btn-outline-primary' }}">1950</a>
            <a href="{{ route('books.index', ['genre' => $genre, 'year' => '1954']) }}"
               class="btn {{ $year === '1954' ? 'btn-primary' : 'btn-outline-primary' }}">1954</a>
            <a href="{{ route('books.index', ['genre' => $genre, 'year' => '1978']) }}"
               class="btn {{ $year === '1978' ? 'btn-primary' : 'btn-outline-primary' }}">1978</a>
            <a href="{{ route('books.index', ['genre' => $genre, 'year' => '2000']) }}"
               class="btn {{ $year === '2000' ? 'btn-primary' : 'btn-outline-primary' }}">2000</a>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Year</th>
                <th>Genre</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>
                        <a href="{{ route('books.show', ['book' => $book['id']]) }}">
                            {{ $loop->iteration }}
                        </a>
                    </td>
                    <td>
                        {{ $book['title'] }}
                        @if (!empty($book['is_featured']))
                            <span class="badge bg-warning text-dark">Featured</span>
                        @endif
                    </td>
                    <td>{{ $book['author'] }}</td>
                    <td>
                        {{ $book['year'] }}
                        @if ($book['year'] >= 2000)
                            <span class="badge bg-primary">Classic</span>
                        @else
                            <span class="badge bg-primary">Oldies</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('books.index', ['genre' => $book['genre'], 'year' => $year]) }}">
                            {{ $book['genre'] }}
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No Books Available</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection