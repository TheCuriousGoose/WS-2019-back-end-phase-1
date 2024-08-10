<?php

use App\Http\Controllers\Api\AttendeeController;
use App\Http\Controllers\Api\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('v1/events', [EventController::class, 'index']);
Route::get('v1/organizers/{organizer}/events/{event}', [EventController::class, 'show']);
Route::post('v1/organizers/{organizer}/events/{event}', [EventController::class, 'register']);

Route::post('v1/login', [AttendeeController::class, 'login']);
Route::post('v1/logout', [AttendeeController::class, 'logout']);
