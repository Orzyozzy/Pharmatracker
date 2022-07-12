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

/* This is For User View Routes  for set reminder*/
Route::get('/reminder', 'HomeController@reminder');


Route::get('/', function () {
    return view('user');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/login', function () {
    return view('pages.login');
});

/* This is for User Page View */

Route::get('/drugs', function () {
    return view('userpage.drugs');
});



Route::get('/dashboard', function () {
    return view('userpage.dashboard');
});




/* This is for Admin Routes, for Auth */
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function()
{ 
Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/login', 'Auth\AdminLoginController@Login')->name('admin.login.submit');
Route::get('/', 'AdminController@index')->name('admin.dashboard');
});
