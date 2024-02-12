<?php

use App\Http\Controllers\GaleriController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('register');
// });

Route::get('/', [UserController::class, 'login']);
Route::get('/register', [UserController::class, 'register']);
Route::post('/daftar', [UserController::class, 'daftar']);
Route::post('/masuk', [UserController::class, 'masuk']);
Route::get('/logout', [UserController::class, 'logout']);

Route::resource('galeri', GaleriController::class)->middleware('auth');
