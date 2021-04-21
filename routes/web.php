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




Route::middleware('auth')->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/start/{topic}/{question}', 'MainController@startLearning')->name('start');

    Route::get('/start2/{topic}', 'MainController@type2')->name('start2');


    Route::any('/submitAnswer', 'MainController@submitAnswer')->name('submitAnswer');


    Route::any('/nextQuestion', 'MainController@nextQuestion')->name('nextQuestion');
    Route::any('/skipQuestion', 'MainController@skipQuestion')->name('skipQuestion');

    Route::any('/score/{topic}', 'ScoreController@index')->name('score');
    Route::any('/nextTopic', 'ScoreController@nextTopic')->name('nextTopic');





    //Route::get('/learning', 'MainController@')->name('main');
    Route::get('/learning/{topic}/{question}', 'MainController@index')->name('main');

    Route::post('/learning', 'MainController@nextQuestion1')->name('nextQuestion1');


//    Route::get('/learning/score')->name('score1');
    //Route::get('/score', 'ScoreController@nextTopic')->name('nextTopic');
    Route::post('/learning/complete', 'ScoreController@learningCompleted');


    Route::get('/main2','MainController@type2')->name('main2');
});


Route::middleware(['auth', 'admin'])->prefix('dashboard')->group(function () {

    Route::get('/', 'DashboardController@index')->name('dashboard');



    Route::resource('admins', 'AdminController');
    Route::resource('users', 'UserController');
    Route::resource('types', 'TypeController');
    Route::resource('topics', 'TopicController');
    Route::resource('questions', 'QuestionController');
    Route::resource('options', 'OptionController');
    Route::resource('pages', 'PageController');
    Route::resource('videos', 'VideoController');
    Route::resource('messages', 'MessageController');

});





Auth::routes();

