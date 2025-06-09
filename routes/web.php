<?php

use App\Http\Controllers\CreationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::redirect('/', '/landingpage');


Route::get('/faq', function () {
    return view('dashboard.faq');
})->name('faqadmin');

Route::get('/landingpage', [LandingPageController::class, 'index'])->name('landingpage.index');
Route::get('/detail/karya/{id}', [CreationController::class, 'detail'])->name('karya.detail');

Route::middleware('auth', 'role:Admin,Pengurus')->group(function () {
    Route::resource('landingpage', LandingPageController::class)->except(['index']);
    Route::get('/create/about', [landingPageController::class, 'createAbout'])->name('about.create');
    Route::put('/create/about/submit', [landingPageController::class, 'storeAbout'])->name('about.store');
    Route::get('/visi', [LandingPageController::class, 'createVisi'])->name('visi.create');
});

Route::middleware('auth', 'role:Admin')->group(function () {});

Route::middleware('auth')->group(function () {
    Route::get('/editor', function () { //blog
        return view('dashboard.blog.editor');
    })->name('editor');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/listuser', [UserController::class, 'index'])->name('listuser');

    Route::get('/validate-member', [UserController::class, 'validate'])->name('validate');
    Route::get('/add-member', [UserController::class, 'addMember'])->name('addMember');
    Route::post('/add-member/store', [UserController::class, 'storeMember'])->name('storeMember');

    Route::get('/karya', [CreationController::class, 'index'])->name('karya.lihat');
    Route::PUT('/karya/submit', [CreationController::class, 'store'])->name('karya.submit');

    Route::patch('/validate-member-true/{id}', [UserController::class, 'validated'])->name('validated');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('uy', function () {
    return 'MASUK MASS';
})->name('testing');

// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
require __DIR__ . '/auth.php';
