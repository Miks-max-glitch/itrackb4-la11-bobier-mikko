@extends('layouts.app')

@section('title', $book['title'])

@section('content')

    <h2 class="mb-3">Book Details</h2>

    <div class="card mb-3" style="max-width: 420px;">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <span>Title: {{ $book['title'] }}</span>
            @if (!empty($book['is_featured']))
                <span class="badge bg-warning text-dark">Featured</span>
            @endif
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Genre: {{ $book['genre'] }}</li>
            <li class="list-group-item">Author: {{ $book['author'] }}</li>
            <li class="list-group-item">Year: {{ $book['year'] }}</li>
        </ul>
    </div>

    <a href="{{ route('books.index') }}" class="btn btn-secondary">Back to List</a>

@endsection