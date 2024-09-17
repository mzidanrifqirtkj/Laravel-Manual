<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
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

// Route::get('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
// Route::get('/admin/login', [AdminAuthController::class, 'store'])->name('admin.login.store');
// Route::post('/admin/logout', [AdminAuthController::class, 'logoutAdmin'])->name('admin.logout');

// Route::get('/panel', [AdminPagesController::class, 'panel_home'])->name('panel')->middleware('auth:admin');

//login
Route::get("/login", function () {
    return view("login");
})->name("login");

Route::post('postLogin', [LoginController::class, 'postLogin'])->name('postLogin');
Route::get('logout', 'LoginController@logout')->name('logout');

//cara masuk
// Route::group(['middleware' => ['auth:user , admin', 'ceklevel:user, admin']],
//     function () {
//         route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//         Route::get('/slide1', [DashboardController::class, 'slide1'])->name('slide1');
//         Route::get('/slide2', [DashboardController::class, 'slide2'])->name('slide2');
//     });

// Rute yang hanya bisa diakses oleh pengguna yang terautentikasi
Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/slide1', [DashboardController::class, 'adminSlide'])->name('admin.slide1');
});

// Rute untuk user
Route::group(['middleware' => ['auth:user']], function () {
    Route::get('/user/dashboard', [DashboardController::class, 'userDashboard'])->name('user.dashboard');
    Route::get('/user/slide2', [DashboardController::class, 'userSlide'])->name('user.slide2');
});
