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
}

