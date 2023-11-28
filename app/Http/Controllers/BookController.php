<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    /**
     * Display a listing of the books.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('admin.pages.books.book', compact('books'));
        // return view('admin.pages.books');
    }

    /**
     * Show the form for creating a new book.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.pages.books.create', compact('categories'));
    }

    /**
     * Store a newly created book in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            //code...
            $request->validate([
                'category_id' => 'required',
                'title' => 'required',
                'description' => 'required',
                'quantity' => 'required|numeric',
                'iamge',
                'author' => 'required',
                'publisher' => 'required',
                'abstract' => 'required',
                'isbn' => 'required',
            ]);
    
            Book::create($request->all());
    
            return redirect()->route('admin.books.index')
                ->with('success', 'Book created successfully.');
        } catch (\Throwable $e) {
            Log::error('Error saving data: ' . $e->getMessage());
            dd($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified book.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        // Retrieve all categories
        $categories = Category::all();

        return view('books.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified book in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'quantity' => 'required|numeric',
            'image' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'abstract' => 'required',
            'ISBN' => 'required',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')
            ->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified book from the database.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully.');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $books = Book::where('title', 'like', '%' . $search . '%')
            ->orWhere('author', 'like', '%' . $search . '%')
            ->orWhere('publisher', 'like', '%' . $search . '%')
            ->get();

        return view('books.index', compact('books', 'search'));
    }
}
