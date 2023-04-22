<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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
    // return view('welcome');
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::match(['get', 'post'], '/user/listing', [UserController::class, 'listing'])->name('user.listing');
    Route::match(['get', 'post'], '/user/add', [UserController::class, 'add'])->name('user.add');
    Route::match(['get', 'post'], '/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::match(['get', 'post'], '/user/delete', [UserController::class, 'delete'])->name('user.delete');

    // ? ROLE
    Route::match(['get', 'post'], '/role/listing', [RoleController::class, 'listing'])->name('roles.listing');
    // ? PERMISSION
    Route::match(['get', 'post'], '/permission/listing')->name('permissions.listing');
});

require __DIR__ . '/auth.php';
