<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Public rountes
// Books
Route::get('/books', [BookApiController::class, 'index']);
Route::get('/books/{id}', [BookApiController::class, 'show']);
Route::get('/books/search/{value}', [BookApiController::class, 'search']);

// Authentication
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    // Books
    Route::post('/books', [BookApiController::class, 'store']);
    Route::put('/books/{id}', [BookApiController::class, 'update']);
    Route::delete('/books/{id}', [BookApiController::class, 'destroy']);

    // Authentication
    Route::post('/logout', [AuthController::class, 'logout']);
});
//
