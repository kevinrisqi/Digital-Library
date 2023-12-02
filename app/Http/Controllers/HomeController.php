<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function welcome()
    {
        // Ambil data buku yang masih tersedia
        $books = Book::where('quantity', '>', 0)->get();

        return view('welcome', compact('books'));
    }

    public function listBooks()
    {
        // Ambil semua data buku
        $books = Book::all();

        return view('welcome', compact('books'));
    }

    public function transactionHistory()
    {
        // Ambil semua data transaksi
        $transactions = Transaction::all();

        return view('transactions.index', compact('transactions'));
    }
}
