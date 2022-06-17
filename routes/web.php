<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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


/**
 * Gestion des véhicules
 */
Route::get('/vehicles', [VehicleController::class, 'vehicles'])
    ->name('vehicle.vehicles');

Route::get('/vehicle/new', [VehicleController::class, 'create'])
    ->name('vehicle.create');

Route::get('/vehicle/{id}', [VehicleController::class, 'show'])
    ->where('id', '[0-9]+')
    ->name('vehicle.show');

Route::post('/vehicle/store', [VehicleController::class, 'store'])
    ->name('vehicle.store');

/**
 * Gestion des réservations
 */

Route::post('/booking/vehicle/{id}', [BookingController::class, 'index'])
    ->name('booking.index');

Route::post('/booking', [BookingController::class, 'store'])
    ->name('booking.store');

Route::get('/my-bookings', [BookingController::class, 'myBookings'])
    ->name('my-bookings');

Route::get('/booking/{id}', [BookingController::class, 'show'])
    ->name('booking.show');

Route::post('/booking/comment/store/{booking_id}', [BookingController::class, 'storeComment'])
    ->name('booking.store.comment');

/**
 * Authentication routes
 */
Route::get('/login', [AuthController::class, 'index'])
    ->name('auth.login');

Route::post('/login', [AuthController::class, 'authenticate'])
    ->name('login');

Route::get('/logout', [AuthController::class, 'logout'])
    ->name('auth.logout');

Route::get('/register', [AuthController::class, 'register'])
    ->name('auth.register');

Route::post('/register', [AuthController::class, 'registerPost'])
    ->name('auth.register.post');

/**
 * Gestion du profil
 */
Route::get('/profile', [UserController::class, 'profile'])->middleware('auth');
Route::post('/profile', [UserController::class, 'update']);
