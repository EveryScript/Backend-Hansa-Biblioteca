<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoansController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Authors
Route::resource('authors', AuthorController::class);
// Clients
Route::resource('clients', ClientController::class);
Route::get('expired-clients', [ClientController::class, 'getExpiredClients']);
// Books
Route::resource('books', BookController::class);
// Loans
Route::resource('loans', LoansController::class);
