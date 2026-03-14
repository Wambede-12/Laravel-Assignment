<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource with search functionality.
     */
    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $query = Book::query();
        $search = $request->input('search');

        // Filter by search term
        if ($search) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('author', 'like', "%{$search}%");
        }

        // Admin can see all books, users see only their own
        if (!Auth::user()->isAdmin()) {
            $query->where('user_id', Auth::id());
        }

        $books = $query->paginate(10);

        return view('books.index', compact('books', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'year' => 'nullable|integer|min:1000|max:2100',
            'description' => 'nullable|string',
        ]);

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'year' => $request->year,
            'description' => $request->description,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $this->authorizeBook($book);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $this->authorizeBook($book);
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $this->authorizeBook($book);

        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'year' => 'nullable|integer|min:1000|max:2100',
            'description' => 'nullable|string',
        ]);

        $book->update($request->all());
        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $this->authorizeBook($book);
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }

    /**
     * Check if the authenticated user can access the book.
     */
    private function authorizeBook(Book $book)
    {
        if (!Auth::user()->isAdmin() && $book->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access to this book.');
        }
    }
}
