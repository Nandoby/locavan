<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VehicleController;
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

Route::get('/', [HomeController::class, 'index'])
    ->name('home');


Route::get('/vehicle/{id}', [VehicleController::class, 'show'])
    ->where('id', '[0-9]+')
    ->name('vehicle.show');

/**
 * Gestion des réservations
 */

Route::post('/booking/vehicle/{id}', [BookingController::class, 'index'])
    ->name('booking.index');

/**
 * Authentication routes
 */
Route::get('/login', [AuthController::class, 'index'])
    ->name('auth.login');

Route::post('/login', [AuthController::class, 'authenticate'])
    ->name('auth.authenticate');

Route::get('/logout', [AuthController::class, 'logout'])
    ->name('auth.logout');

Route::get('/register', [AuthController::class, 'register'])
    ->name('auth.register');

Route::post('/register', [AuthController::class, 'registerPost'])
    ->name('auth.register.post');
