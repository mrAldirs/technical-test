<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::resource('position', PositionController::class)->middleware('auth');
Route::resource('employee', EmployeeController::class)->middleware('auth');
Route::get('/aktifkan/{id}', [EmployeeController::class, 'aktifkan'])->name('aktifkan.employee');
Route::get('/nonaktifkan/{id}', [EmployeeController::class, 'nonaktifkan'])->name('nonaktifkan.employee');
