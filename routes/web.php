<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LockScreen;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\LeavesController;
use App\Http\Controllers\ExpenseReportsController;
use App\Http\Controllers\PerformanceController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\TrainersController;
use App\Http\Controllers\TrainingTypeController;
use App\Http\Controllers\SalesController;
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


/* This is For User View Routes  for set reminder*/




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

Route::get('/reminder', function (){
    return view('userpage.reminder');
});

Route::get('sendMsg', 'NexmoSMSController@backup');
Route::get('/send/message',[App\Http\Controllers\SmsController::class, 'sendMessage']);
Route::get('dashboard','ReminderViewwController@remind');
Route::get('/search','ReminderViewwController@searchTest');
Route::get('drugs','ReminderViewwController@drugs');



Route::controller(LeavesController::class)->group(function () {
 
    Route::post('sendMsg', 'saveRecord')->middleware('auth')->name('form/leaves/save');
    Route::post('form/leaves/edit', 'editRecordLeave')->middleware('auth')->name('form/leaves/edit');
    Route::post('form/leaves/edit/delete','deleteLeave')->middleware('auth')->name('form/leaves/edit/delete');    
 
       
  
});




Route::post('/registeradmin', 'AdminController@saveAdmin')->name('admin/register/admin');
 
    

/* This is for Admin Routes, for Auth */
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('/home');

Route::prefix('/admin')->group(function()
{ 
    
Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/login', 'Auth\AdminLoginController@Login')->name('admin.login.submit');
Route::get('/', 'AdminController@index')->name('admin.dashboard');
Route::post('/register/user', 'AdminController@saveRecord')->name('admin/register/save');



});
