<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::resource('categories', CategoryController::class);

// Route::resource('books', BookController::class)->except(['show']);
// Route::get('/books/search', [BookController::class, 'search'])->name('books.search');

Route::prefix('admin')->middleware('admin')->group(function () {
    /// * Default Route
    Route::get('/', [DashboardController::class, 'showDashboard']);
    
    /// * Dashboard Route
    Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('admin.dashboard.index');

    /// * Books Route
    Route::get('/books', [BookController::class, 'index'])->name('admin.books.index');
    Route::get('/books/create', [BookController::class, 'create'])->name('admin.books.create');
    Route::post('/books/store', [BookController::class, 'store'])->name('admin.books.store');
    Route::get('/books/edit/{id}', [BookController::class, 'edit'])->name('admin.books.edit');
    Route::put('/books/update/{id}', [BookController::class, 'update'])->name('admin.books.update');
    Route::delete('/books/delete/{id}', [BookController::class, 'destroy'])->name('admin.books.destroy');

    /// * User Route
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/update/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    /// * Category Route
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/categories/update/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/categories/destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    /// * Transaction Route
    Route::get('/transactions', [TransactionController::class, 'index'])->name('admin.transactions.index');
    Route::get('/transactions/create/{book_id}', [TransactionController::class, 'create'])->name('admin.transactions.create');
    Route::post('/transactions/store/{book_id}', [TransactionController::class, 'store'])->name('admin.transactions.store');
    Route::get('/transactions/edit/{id}', [TransactionController::class, 'edit'])->name('admin.transactions.edit');
    Route::put('/transactions/update/{id}', [TransactionController::class, 'update'])->name('admin.transactions.update');
    Route::delete('/transactions/destroy/{id}', [TransactionController::class, 'destroy'])->name('admin.transactions.destroy');
    Route::put('/transactions/returnBook/{id}', [TransactionController::class, 'returnBook'])->name('admin.transactions.returnBook');

    /// * Login Route
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login']);
    Route::get('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    // Route::get('/login', 'AdminLoginController@showLoginForm')->name('admin.login');
    // Route::post('/login', 'AdminLoginController@login');
    // Route::post('/logout', 'AdminLoginController@logout')->name('admin.logout');


    // Route::get('/index', [AdminController::class, 'index'])->name('admin.index');
    // Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
    // Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
    // Add other admin routes...
});

Route::get('/', [HomeController::class, 'listBooks']);

// Route::middleware(['auth'])->group(function () {
//     // Your authenticated routes here...
// });

// Route::middleware(['auth:admin'])->group(function () {
//     // Your admin-only routes here...
// });

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
