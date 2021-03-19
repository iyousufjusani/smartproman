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




Route::get('/', function () {
    $title = 'Smart Pro Man Club';
    $subtitle = 'HVAC Engineering Professional Club';
    return view('index', compact('title','subtitle'));

});

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