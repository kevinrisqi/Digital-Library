<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;


use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['user', 'book'])->get();
        return view('admin.pages.transactions.transaction', compact('transactions'));
    }

    public function create($book_id)
    {
        return view('admin.pages.transactions.create', compact('book_id'));
    }

    public function store($book_id)
    {
        try {
            // Retrieve the book
            $book = Book::findOrFail($book_id);

            // Check if the book is available
            if ($book->quantity <= 0) {
                return redirect()->route('admin.books.index')->with('error', 'The book is not available for borrowing.');
            }

            // Create a new transaction
            Transaction::create([
                'user_id' => 1, // Assuming you are using authentication
                'book_id' => $book_id,
                'borrowed_date' => now(),
                'status' => 'Borrowed',
                'quantity' => 1, // You can adjust this based on your requirements
                'borrow_days' => 7, // Set the number of days for borrowing
                'due_date' => now()->addDays(7), // Due date is set to 7 days from now
                'returned' => 0,
            ]);

            // Update the book quantity
            $book->decrement('quantity');

            return redirect()->route('admin.transactions.index')->with('success', 'Book borrowed successfully.');
        } catch (\Throwable $e) {
            dd($e);
            return redirect()->route('admin.books.index')->with('error', 'Error creating transaction.');
        }
    }

    public function edit(Transaction $transaction)
    {
        return view('admin.transactions.edit', compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            // Add your validation rules here based on your model
        ]);

        $transaction->update($request->all());

        return redirect()->route('admin.pages.transactions.transaction')->with('success', 'Transaction updated successfully.');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('admin.pages.transactions.transaction')->with('success', 'Transaction deleted successfully.');
    }

    public function returnBook(Transaction $transaction)
    {
        try {
            // Update the transaction
            $transaction->returned = 1;
            $transaction->status = 'Returned';
            $transaction->returned_date = now();
            $transaction->save();

            // Update the quantity of the book
            $book = $transaction->book;
            $book->quantity += $transaction->quantity;
            $book->save();

            return redirect()->route('admin.pages.transactions.transaction')->with('success', 'Buku berhasil dikembalikan.');
        } catch (\Exception $e) {
            return redirect()->route('admin.pages.transactions.transaction')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
