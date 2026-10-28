@extends('layouts.app')

@section('title', 'Edit Book')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Edit Book</h3>

            <form action="{{ route('books.update', $book) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $book->title) }}">
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Author</label>
                    <input type="text" name="author" class="form-control" value="{{ old('author', $book->author) }}">
                    @error('author')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Year</label>
                    <input type="text" name="year" class="form-control" value="{{ old('year', $book->year) }}">
                    @error('year')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Genre</label>
                    <select name="genre_id" class="form-select">
                        <option value="">Choose a genre</option>
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}"
                                @selected(old('genre_id', $book->genre_id) == $genre->id)
                            >{{ $genre->name }}</option>
                        @endforeach
                    </select>
                    @error('genre_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>

            </form>
        </div>
    </div>
@endsection