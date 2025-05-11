<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
})->name('anu');



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

    Route::get('/editor', function () {
        return view('dashboard.editor');
    })->name('editor');

    Route::get('/general', [LandingPageController::class, 'index'])->name('general');
    Route::post('/general/store', [LandingPageController::class, 'tambah'])->name('generalStore');

    Route::get('/listuser', [UserController::class, 'index'])->name('listuser');
    Route::get('/validate-member', [UserController::class, 'validate'])->name('validate');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/testing', function () {
    return 'MASUK MASS';
})->name('testing');

// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
require __DIR__ . '/auth.php';
