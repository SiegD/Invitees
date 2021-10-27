<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\registercontroller;
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

Route::get('/', function () {
    return view('undangan.undangannikah');
});

Route::get('/home', function () {
    return view('Landing.index', [
        'title' => 'Home'
    ]);
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/register', [registercontroller::class, 'index'])->middleware('guest');
Route::post('/register', [registercontroller::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
