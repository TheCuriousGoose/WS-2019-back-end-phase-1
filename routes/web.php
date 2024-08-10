<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TicketController;
use Illuminate\Notifications\ChannelManager;
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


Route::get('/login', [AuthController::class, 'show'])->name('auth.show');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('events', EventController::class)->parameter('event', 'slug');
    Route::resource('events.tickets', TicketController::class)->only(['create', 'store']);
    Route::resource('events.sessions', SessionController::class)->only(['create', 'store', 'edit', 'update']);
    Route::resource('events.channels', ChannelController::class)->only(['create', 'store']);
    Route::resource('events.rooms', RoomController::class)->only(['create', 'store']);
});
