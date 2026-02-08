@extends('layouts.app')

@section('content')
    <div class="card">
        <h2 style="margin-bottom: 20px;">📖 All Books</h2>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('books.create') }}" class="btn btn-success" style="margin-bottom: 20px;">+ Add New Book</a>

        @if($books->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Year</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->year ?? 'N/A' }}</td>
                            <td class="actions">
                                <a href="{{ route('books.show', $book) }}" class="btn btn-primary">View</a>
                                <a href="{{ route('books.edit', $book) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p style="text-align: center; color: #666; padding: 40px;">No books found. <a href="{{ route('books.create') }}">Add your first book!</a></p>
        @endif
    </div>
@endsection
