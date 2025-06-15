<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CreationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::redirect('/', '/landingpage');

Route::get('/landingpage', [LandingPageController::class, 'index'])->name('landingpage.index');

Route::get('/blogs', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog', [BlogController::class, 'detail'])->name('blog.detail');

Route::middleware('auth', 'role:Admin,Pengurus')->group(function () {
    Route::resource('landingpage', LandingPageController::class)->except(['index']);

    Route::get('/create/about', [landingPageController::class, 'createAbout'])->name('about.create');
    Route::put('/create/about/submit', [landingPageController::class, 'storeAbout'])->name('about.store');
    Route::get('/visi', [LandingPageController::class, 'createVisi'])->name('visi.create');

    Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
    Route::get('/faq/tambah', [FaqController::class, 'tambah'])->name('faq.tambah');
    Route::post('/faq/tambah/submit', [FaqController::class, 'store'])->name('faq.store');
    Route::put('/faq/update/{id}', [FaqController::class, 'update'])->name('faq.update');
    Route::get('/faq/delete/{id}', [FaqController::class, 'destroy'])->name('faq.delete');

    Route::get('/listuser', [UserController::class, 'index'])->name('listuser');
    Route::get('/validate-member', [UserController::class, 'validate'])->name('validate');
    Route::patch('/validate-member-true/{id}', [UserController::class, 'validated'])->name('validated');

    Route::get('/logo-divisi', [LogoController::class, 'index'])->name('logo.index');
    Route::get('/logo-divisi/create', [LogoController::class, 'create'])->name('logo.create');
    Route::post('/logo-divisi/submit', [LogoController::class, 'store'])->name('logo.store');
    Route::get('/logo-divisi/edit/{id}', [LogoController::class, 'edit'])->name('logo.edit');
    Route::put('/logo-divisi/update/{id}', [LogoController::class, 'update'])->name('logo.update');
    Route::get('/logo-divisi/delete/{id}', [LogoController::class, 'destroy'])->name('logo.delete');

    Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
    Route::post('/contact/submit', [ContactController::class, 'store'])->name('contact.store');
    Route::put('/contact/update/{id}', [ContactController::class, 'update'])->name('contact.update');
});

Route::middleware('auth', 'role:Admin')->group(function () {
    Route::get('/testimonial/create', [TestimonialController::class, 'index'])->name('testimonial.index');
    Route::post('/testinomial/create/submit', [TestimonialController::class, 'create'])->name('testimonial.create');
    Route::get('/testimonial/edit/{id}', [TestimonialController::class, 'edit'])->name('testimonial.edit');
    Route::post('/testinomial/edit/submit/{id}', [TestimonialController::class, 'update'])->name('testimonial.update');
    Route::get('/testimonial', [TestimonialController::class, 'lihat'])->name('testimonial.lihat');
    Route::post('/testimonial/delete/{id}', [TestimonialController::class, 'destroy'])->name('testimonial.delete');

    Route::get('/add-member', [UserController::class, 'addMember'])->name('addMember');
    Route::post('/add-member/store', [UserController::class, 'storeMember'])->name('storeMember');
});

Route::middleware('auth')->group(function () {
    Route::get('/editor', function () {
        return view('dashboard.blog.editor');
    })->name('editor');

    Route::post('/user/update/profile/{id}', [UserController::class, 'update'])->name('user.update');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/karya', [CreationController::class, 'index'])->name('karya.lihat');
    Route::PUT('/karya/submit', [CreationController::class, 'store'])->name('karya.submit');
    Route::get('/detail/karya/{id}', [CreationController::class, 'detail'])->name('karya.detail');

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
