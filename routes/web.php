<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
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




Route::get('/', function () {
    $title = 'Smart Pro Man Club';
    $subtitle = 'HVAC Engineering Professional Club';
    return view('main', compact('title','subtitle'));

});

Route::get('/dashboard','DashboardController@index')->name('dashboard');

Route::get('/admin-login',function(){
    return view('Admin.admin-login');
});

//Route::resource('topics', 'TopicController');


//Route::get('/welcome', function (){
//    return "Laravel app";
//});
//
//
//Route::get('/home/{name?}', function ($name="Guest"){
//    return "Welcome, " . $name;
//});

//Route::redirect('/','home');
//Route::view('/','welcome');
Auth::routes();

//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [Controllers\HomeController::class, 'index'])->name('home');

Route::resource('admins', 'AdminController');
Route::resource('users', 'UserController');
Route::resource('types', 'TypeController');
Route::resource('topics', 'TopicController');
Route::resource('questions', 'QuestionController');
Route::resource('options', 'OptionController');
Route::resource('pages', 'PageController');
Route::resource('videos', 'VideoController');
Route::resource('messages', 'MessageController');



