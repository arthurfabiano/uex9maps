<?php

use App\Http\Controllers\{
    DashboardController,
    UserController
};
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

Route::get('/', [UserController::class, 'index'])->name('user.index');
Route::post('/', [UserController::class, 'login'])->name('user.login');
Route::get('/register', [UserController::class, 'create'])->name('user.create');
Route::post('/store', [UserController::class, 'store'])->name('user.store');
Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show')->middleware('auth');;
Route::put('/users/{id}', [UserController::class, 'update'])->name('user.update');
Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');

Route::get('/forgot-password', [UserController::class, 'forgotpassword'])->name('user.forgotpassword');
Route::get('/password-email', [UserController::class, 'passwordemail'])->name('password.email');

Route::get('/listUsers', [UserController::class, 'listUsers']);
Route::get('/listusersmap', [UserController::class, 'listUsersMap'])->name('user.listuser');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');
