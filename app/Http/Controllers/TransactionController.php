<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['user', 'book'])->get();
        return view('admin.pages.transactions.transaction', compact('transactions'));
    }

    public function create()
    {
        return view('admin.transactions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            // Add your validation rules here based on your model
        ]);

        Transaction::create($request->all());

        return redirect()->route('admin.pages.transactions.transaction')->with('success', 'Transaction created successfully.');
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
