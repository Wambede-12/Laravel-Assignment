@extends('layouts.app')

@section('content')
    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h2>My Books</h2>
            <form action="{{ route('books.index') }}" method="GET" style="display: flex; gap: 10px;">
                <input type="text" name="search" placeholder="Search by title or author..." value="{{ $search }}" style="padding: 8px; flex: 1;">
                <button type="submit" class="btn btn-primary">Search</button>
                @if($search)
                    <a href="{{ route('books.index') }}" class="btn btn-secondary">Clear</a>
                @endif
            </form>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div style="margin-bottom: 20px;">
            <a href="{{ route('books.create') }}" class="btn btn-success">+ Add New Book</a>
        </div>

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
                            <td><strong>{{ $book->title }}</strong></td>
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

            <!-- Pagination -->
            <div style="margin-top: 20px;">
                {{ $books->links() }}
            </div>
        @else
            <p style="text-align: center; color: #999; padding: 40px;">
                @if($search)
                    No books found matching "<strong>{{ $search }}</strong>". <a href="{{ route('books.index') }}">Clear search</a>
                @else
                    No books found. <a href="{{ route('books.create') }}">Add your first book</a>
                @endif
            </p>
        @endif
    </div>
@endsection

