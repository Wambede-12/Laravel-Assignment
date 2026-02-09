@extends('layouts.app')

@section('content')
    <div class="card">
        <h2>Edit Book</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('books.update', $book) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="title">Book Title *</label>
                <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}" required>
            </div>

            <div class="form-group">
                <label for="author">Author *</label>
                <input type="text" name="author" id="author" value="{{ old('author', $book->author) }}" required>
            </div>

            <div class="form-group">
                <label for="year">Publication Year</label>
                <input type="number" name="year" id="year" value="{{ old('year', $book->year) }}" min="1000" max="2100">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description">{{ old('description', $book->description) }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Update Book</button>
            <a href="{{ route('books.index') }}" class="btn btn-primary">Cancel</a>
        </form>
    </div>
@endsection
