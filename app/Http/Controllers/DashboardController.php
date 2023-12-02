<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        $totalBooks = Book::count();
        $totalUsers = User::count();
        $totalTransactions = Transaction::count();
        $totalBorrowedBooks = Transaction::where('returned', 0)->sum('quantity');

        return view('admin.pages.dashboard.dashboard', compact('totalBooks', 'totalUsers', 'totalTransactions', 'totalBorrowedBooks'));
    }
}
