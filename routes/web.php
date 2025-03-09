<?php

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

<<<<<<< HEAD
Route::get('/', function () {
    return view('welcome');
});
=======


Route::get('/', function(){
    return view('front.layouts.app');
});

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
})->name('about');

Route::get('/home', function () {
    return view('front.layouts.home');
})->name('home');

Route::get('/hobby', function () {
    return view('front.layouts.hobby');
})->name('hobby');

Route::get('/app', function(){
    return view('panel.layout.app');
})->name('app');

Route::get('/sertification', function(){
    return view('front.layouts.sertification');
})->name('sertification');
>>>>>>> 247e007 (genel taslak oluşturuldu)
