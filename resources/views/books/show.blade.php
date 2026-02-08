@extends('layouts.app')

@section('content')
    <div class="card">
        <h2 style="margin-bottom: 20px;">📖 {{ $book->title }}</h2>

        <table style="margin-bottom: 20px;">
            <tr>
                <th style="width: 150px;">Title</th>
                <td>{{ $book->title }}</td>
            </tr>
            <tr>
                <th>Author</th>
                <td>{{ $book->author }}</td>
            </tr>
            <tr>
                <th>Year</th>
                <td>{{ $book->year ?? 'Not specified' }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ $book->description ?? 'No description available' }}</td>
            </tr>
            <tr>
                <th>Added On</th>
                <td>{{ $book->created_at->format('F j, Y') }}</td>
            </tr>
        </table>

        <a href="{{ route('books.edit', $book) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('books.index') }}" class="btn btn-primary">Back to List</a>
        
        <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
        </form>
    </div>
@endsection
