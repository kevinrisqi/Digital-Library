<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('categories', CategoryController::class);

Route::resource('books', BookController::class)->except(['show']);
Route::get('/books/search', [BookController::class, 'search'])->name('books.search');

Route::prefix('admin')->group(function () {
    /// * Default Route
    Route::get('/', [AdminPanelController::class, 'index']);

    /// * Dashboard Route
    Route::get('/dashboard', [AdminPanelController::class, 'showDashboard'])->name('admin.dashboard');

    /// * Books Route
    Route::get('/books', [BookController::class, 'index'])->name('admin.books.index');
    Route::get('/books/create', [BookController::class, 'create'])->name('admin.books.create');
    Route::post('/books/store', [BookController::class, 'store'])->name('admin.books.store');
    Route::get('/books/edit', [BookController::class, 'edit'])->name('admin.books.edit');
    Route::put('/books/update/{id}', [BookController::class, 'update'])->name('admin.books.update');
    Route::delete('/books/delete/{id}', [BookController::class, 'destroy'])->name('admin.books.destroy');

    /// * User Route
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/update/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    /// * Login Route
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login']);
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    Route::get('/index', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
    // Add other admin routes...
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
