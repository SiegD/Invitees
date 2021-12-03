<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardEventTypeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventTypeController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MyEventController;
use App\Http\Controllers\registercontroller;
use App\Http\Controllers\UndanganController;
use App\Http\Controllers\UserController;
use App\Models\guest;
use App\Models\location;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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
    return view('Landing.index', [
        'title' => 'Home'
    ]);
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

Route::get('dashboard/events/checkSlug', [EventController::class, 'checkslug'])->middleware('auth');
Route::resource('dashboard/events', EventController::class)->middleware('auth');

Route::resource('dashboard/event_type', EventTypeController::class)->middleware('auth');
Route::resource('dashboard/location', LocationController::class)->middleware('auth');
Route::resource('dashboard/users', ClientController::class)->middleware('auth');

Route::get('dashboard/profile', [UserController::class, 'index'])->middleware('auth');
Route::post('dashboard/profile/{user}', [UserController::class, 'update'])->middleware('auth');

Route::get('/dashboard/undanganku/{slug}', [MyEventController::class, 'show'])->middleware('auth');
Route::get('/dashboard/undanganku', [MyEventController::class, 'index'])->middleware('auth');

Route::get('/dashboard/data-tamu', [GuestController::class, 'index'])->middleware('auth');
Route::get('dashboard/data-tamu/checkSlug', [GuestController::class, 'checkslug'])->middleware('auth');
Route::resource('dashboard/data-tamu', GuestController::class)->middleware('auth');

Route::get('undangan/{event_slug}/{slug}', [UndanganController::class, 'show']);
Route::Post('undangan/{event_slug}/{slug}', [UndanganController::class, 'submit']);


Route::get('undangan/{event_slug}/{guest}/confirm={confirm}', [UndanganController::class, 'barcode'])->middleware('auth');

Route::get('undanganultah', function () {
    return view('Undangan.undanganultah', [
        'title' => 'Undangan Ultah'
    ]);
});
