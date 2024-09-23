<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::get('/', function () {
    return view('welcome');
});


//login
Route::get("/login", function () {
    return view("auth.login");
})->name("login");

Route::post('postLogin', [LoginController::class, 'postLogin'])->name('postLogin');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register', [RegisterController::class, 'postRegister'])->name('postRegister');


// Rute yang hanya bisa diakses oleh pengguna yang terautentikasi
Route::prefix('admin')->middleware('auth.custom')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/slide1', [AdminController::class, 'adminSlide'])->name('admin.slide1');
});

Route::prefix('user')->middleware('auth.custom')->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/slide2', [UserController::class, 'userSlide'])->name('user.slide2');
});
