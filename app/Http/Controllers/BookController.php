<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the books.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Get the search term from the request
        $search = $request->input('search');

        if ($search) {
            // Query books based on the search term
            $books = Book::where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->orWhere('author', 'like', '%' . $search . '%')
                ->orWhere('publisher', 'like', '%' . $search . '%')->get();

            // dd($books);

            // Pass the search term and books to the view
            return view('admin.pages.books.book', compact('search', 'books'));
        } else {

            $books = Book::all();
            return view('admin.pages.books.book', compact('books'));
            // return view('admin.pages.books');
        }
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
            $request->validate([
                'category_id' => 'required',
                'title' => 'required',
                'description' => 'required',
                'quantity' => 'required|numeric',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'author' => 'required',
                'publisher' => 'required',
                'abstract' => 'required',
                'isbn' => 'required',
            ]);

            if ($request->hasFile('image')) {
                // Ensure the 'image' file is present in the request
                $imagePath = $request->file('image')->store('books_images', 'public');
            } else {
                // Handle the case where no image is provided
                $imagePath = null;
            }

            Book::create([
                'category_id' => $request->category_id,
                'title' => $request->title,
                'description' => $request->description,
                'quantity' => $request->quantity,
                'image' => $imagePath,
                'author' => $request->author,
                'publisher' => $request->publisher,
                'abstract' => $request->abstract,
                'isbn' => $request->isbn,
            ]);

            return redirect()->route('admin.books.index')
                ->with('success', 'Book created successfully.');
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified book.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);

        if (!$book) {
            abort(404); // or redirect to a 404 page
        }

        // Retrieve all categories
        $categories = Category::all();

        return view('admin.pages.books.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified book in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'category_id' => 'required',
                'title' => 'required',
                'description' => 'required',
                'quantity' => 'required|numeric',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'author' => 'required',
                'publisher' => 'required',
                'abstract' => 'required',
                'isbn' => 'required',
            ]);

            // Find the book by ID
            $book = Book::findOrFail($id);

            // Check if a new image is uploaded
            if ($request->hasFile('image')) {
                // Delete existing image if needed
                Storage::disk('public')->delete($book->image);

                // Upload new image
                $imagePath = $request->file('image')->store('books_images', 'public');
                $book->update(['image' => $imagePath]);
            }

            // Update other fields
            $book->update($request->except('image'));

            // Redirect to the index page
            return redirect()->route('admin.books.index')->with('success', 'Book updated successfully.');
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
    }


    /**
     * Remove the specified book from the database.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        /// * To check id is exist on DB or not
        /// * If not will throw on exception
        $book = Book::findOrFail($id);

        $book->delete();

        return redirect()->route('admin.books.index')
            ->with('success', 'Book deleted successfully.');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $books = Book::where('title', 'like', '%' . $search . '%')
            ->orWhere('author', 'like', '%' . $search . '%')
            ->orWhere('publisher', 'like', '%' . $search . '%')
            ->get();

        return view('admin.pages.books.book', compact('books', 'search'));
    }
}
