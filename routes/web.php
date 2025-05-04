<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\KitapController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\CertificateController;
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

Route::get('/blog', function(){
    return view('front.layouts.blog');
})->name('blog');

Route::get('/education', function(){
    return view('front.layouts.education');
})->name('education');

Route::get('/contact', function(){
    return view('front.layouts.contact');
})->name('contact');

Route::get('/about', function(){
    return view('front.layouts.about');
})->name('front.about');

Route::get('/home', function () {
    return view('front.layouts.home');
})->name('home');

Route::get('/hobby', function () {
    return view('front.layouts.hobby');
})->name('hobby');

Route::get('/sertification', function(){
    return view('front.layouts.sertification');
})->name('sertification');
Route::get('/', function() {
    return view('admin.layouts.app');
})->middleware('auth')->name('home');


// About Routes
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/about/edit', [AboutController::class, 'edit'])->name('about.edit');
Route::put('/about/update', [AboutController::class, 'update'])->name('about.update');

// Blog Routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/blog/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
Route::put('/blog/{id}', [BlogController::class, 'update'])->name('blog.update');
Route::delete('/blog/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');  // Silme rotası


// Certification Routes
Route::get('/certificates', [CertificateController::class, 'index'])->name('certificate.index');
Route::get('/certificates/create', [CertificateController::class, 'create'])->name('certificate.create');
Route::post('/certificates', [CertificateController::class, 'store'])->name('certificate.store');
Route::get('/certificates/{id}/edit', [CertificateController::class, 'edit'])->name('certificate.edit'); // Düzenleme rotası
Route::put('/certificates/{id}', [CertificateController::class, 'update'])->name('certificate.update'); // Güncelleme rotası
Route::delete('/certificates/{id}', [CertificateController::class, 'destroy'])->name('certificate.destroy'); // Silme rotası


// Film Routes
Route::get('/films/create', [FilmController::class, 'create'])->name('films.create');
Route::post('/films/store', [FilmController::class, 'store'])->name('films.store');
Route::get('/films/index', [FilmController::class, 'index'])->name('films.index');
Route::get('/film/edit/{id}', [FilmController::class, 'edit'])->name('films.edit');
Route::put('/films/{id}', [FilmController::class, 'update'])->name('films.update');
Route::delete('/films/{id}', [FilmController::class, 'destroy'])->name('films.destroy');

// Contact Routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/contact/edit', [ContactController::class, 'edit'])->name('contact.edit');
Route::put('/contact/{id}', [ContactController::class, 'update'])->name('contact.update');

// Project Routes
Route::resource('project', ProjectController::class);

/// GİRİŞ İŞLEMLERİ

// Kayıt sayfası
Route::get('/register', function () {
    return view('admin.user.signUp');
})->name('register');

// Kayıt işlemi
Route::post('/register', [AuthController::class, 'register']);

// Giriş sayfası (GET isteği ile form görüntülenir)
Route::get('/login', function () {
    return view('admin.user.signIn');  // Giriş formunu burada tanımlayabilirsin
})->name('login.form');

// Giriş işlemi
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Çıkış işlemi
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/// END GİRİŞ İŞLEMLERİ
