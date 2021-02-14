<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SportEventController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\SportController;

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

Route::get('/', [SportEventController::class, 'index']);
Route::get('/organizers', [OrganizerController::class, 'index']);
Route::get('/sports', [SportController::class, 'index']);