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
use App\Http\Controllers\VotingController;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/landingpage');

Route::get('/testings', function () {
    $tes = Blog::where('slug', 'testing-lagi-1750345105')->first();
    dd($tes->first_image);
});

Route::get('/landingpage', [LandingPageController::class, 'index'])->name('landingpage.index');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'detail'])->name('blog.detail');

Route::get('/detail/karya/{id}', [CreationController::class, 'detail'])->name('karya.detail');


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

    Route::get('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
    Route::get('/listuser', [UserController::class, 'index'])->name('listuser');
    Route::get('/validate-member', [UserController::class, 'validate'])->name('validate');
    Route::patch('/validate-member-true/{id}', [UserController::class, 'validated'])->name('validated');

    Route::get('/logo-divisi', [LogoController::class, 'index'])->name('logo.index');
    Route::get('/logo-divisi/create', [LogoController::class, 'create'])->name('logo.create');
    Route::post('/logo-divisi/submit', [LogoController::class, 'store'])->name('logo.store');
    Route::get('/logo-divisi/edit/{id}', [LogoController::class, 'edit'])->name('logo.edit');
    Route::put('/logo-divisi/update/{id}', [LogoController::class, 'update'])->name('logo.update');
    Route::get('/logo-divisi/delete/{id}', [LogoController::class, 'destroy'])->name('logo.delete');

    Route::get('/contact/create', [ContactController::class, 'create'])->name('contact.create');
    Route::post('/contact/submit', [ContactController::class, 'store'])->name('contact.store');
    Route::put('/contact/update/{id}', [ContactController::class, 'update'])->name('contact.update');

    Route::get('/blogs', [BlogController::class, 'lihat'])->name('blog.lihat');
    Route::get('/blog/create/new', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/blog/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('/blog/{id}/update', [BlogController::class, 'update'])->name('blog.update');
    Route::get('/blog/{id}/delete', [BlogController::class, 'destroy'])->name('blog.delete');

    Route::patch('/karya/{id}/validated', [CreationController::class, 'validated'])->name('karya.validated');
    Route::patch('/karya/{id}/unvalidated', [CreationController::class, 'unvalidated'])->name('karya.unvalidated');
    Route::get('/karya/validate', [CreationController::class, 'validate'])->name('karya.validate');
    Route::get('/karya/lihat/all', [CreationController::class, 'total'])->name('karya.total');
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

Route::middleware('auth', 'role:Anggota,Admin,Pengurus')->group(function () {
    Route::get('/karya', [CreationController::class, 'index'])->name('karya.lihat');
    Route::PUT('/karya/submit', [CreationController::class, 'store'])->name('karya.submit');
    Route::get('/karya/edit/{id}', [CreationController::class, 'edit'])->name('karya.edit');
    Route::get('/karya/delete/{id}', [CreationController::class, 'destroy'])->name('karya.delete');
});


Route::middleware('auth')->group(function () {
    Route::post('/user/update/profile/{id}', [UserController::class, 'update'])->name('user.update');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/voted/{nama}', [VotingController::class, 'voting'])->name('voted');
Route::get('/voting-login', [VotingController::class, 'login'])->name('voting.login');
Route::post('/voting-login-code', [VotingController::class, 'postLogin'])->name('voting.codeLogin');
Route::get('/voting', [VotingController::class, 'index'])->name('voting')->middleware('votingAuth');
Route::get('/hasil-voting', [VotingController::class, 'showResults']);
Route::get('/cetak-voting', [VotingController::class, 'cetak'])->name('cetak.voting');

Route::get('uy', function () {
    return 'MASUK MASS';
})->name('testing');

// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
require __DIR__ . '/auth.php';
