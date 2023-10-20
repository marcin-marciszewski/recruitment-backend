<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookCotroller;
use App\Http\Controllers\UserController;

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

//------------------ Books ----------------------------
// All books
Route::get('/', [BookCotroller::class, 'index']);

// Store book data
Route::post('/books', [BookCotroller::class, 'store'])->middleware('auth');

// Show create form
Route::get('/books/create', [BookCotroller::class, 'create'])->middleware('auth');

// Show edit form
Route::get('/books/{book}/edit', [BookCotroller::class, 'edit'])->middleware('auth');

// Update book
Route::put('/books/{book}', [BookCotroller::class, 'update'])->middleware('auth');

// Delete book
Route::delete('/books/{book}', [BookCotroller::class, 'destroy'])->middleware('auth');

// Get single book
Route::get('/books/{book}', [BookCotroller::class, 'show']);

//------------------ Users ----------------------------

// Register user
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create new user
Route::post('/users', [UserController::class, 'store']);

// Logout user
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
