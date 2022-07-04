<?php

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
/*
Route::get('/about', function () {
    return view('about');
});
*/
Route::get('/', function () {
    return view('user');
});

Route::get('/contact', function () {
    return view('pages.contact');
});

Route::get('/providers/services', function () {
    return view('pages.providers');
});


Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/login', function () {
    return view('pages.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');


