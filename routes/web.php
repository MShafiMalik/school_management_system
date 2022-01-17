<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProfileController;
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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
    // return view('dashboard');
})->name('dashboard');

Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// All User Routes
Route::prefix('User')->group(function () {
    Route::get('/View', [UserController::class, 'view'])->name('user.view');
    Route::get('/Add', [UserController::class, 'add'])->name('user.add');
    Route::post('/Store', [UserController::class, 'store'])->name('user.store');
    Route::get('/Edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/Update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/Delete/{id}', [UserController::class, 'delete'])->name('user.delete');
});

// Profile Routes
Route::prefix('Profile')->group(function () {
    Route::get('/View', [ProfileController::class, 'view'])->name('profile.view');
    Route::get('/Edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/Update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/change_password', [ProfileController::class, 'change_password'])->name('profile.change_password');
    Route::post('/update_password', [ProfileController::class, 'update_password'])->name('profile.update_password');
});