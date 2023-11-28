<?php

// app/Http/Controllers/AdminDashboardController.php

namespace App\Http\Controllers;

class AdminPanelController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function showDashboard()
    {
        return view('admin.pages.dashboard');
    }

    public function showUsers()
    {
        return view('admin.pages.users');
    }

    // public function showBooks()
    // {
    //     // $books = Book::all();
    //     // return view('admin.pages.books', compact('books'));
    //     return view('admin.pages.books');
    // }
}

