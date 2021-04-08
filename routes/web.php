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
    return view('index', compact('title', 'subtitle'));
})->middleware('guest');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/admin-login', function () {
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


//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', 'HomeController@index')->name('home');

//Route::middleware('auth')->group(function () {

//Route::get('/learning', 'MainController@')->name('main');

Route::get('/learning/{topic}/{question}', 'MainController@index')->name('main');

Route::post('/learning', 'MainController@nextQuestion')->name('nextQuestion');


Route::get('/learning/score')->name('score');



//Route::get('/score', 'ScoreController@nextTopic')->name('nextTopic');


Route::post('/learning/complete', 'ScoreController@learningCompleted');

//});

Route::resource('admins', 'AdminController');
Route::resource('users', 'UserController');
Route::resource('types', 'TypeController');
Route::resource('topics', 'TopicController');
Route::resource('questions', 'QuestionController');
Route::resource('options', 'OptionController');
Route::resource('pages', 'PageController');
Route::resource('videos', 'VideoController');
Route::resource('messages', 'MessageController');

Auth::routes();

