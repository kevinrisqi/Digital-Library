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
}

