<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/lorem-ipsum', function () {
    return view('lorem-ipsum');
});

Route::post('/lorem-ipsum', 'GeneratorController@processTextForm');

Route::get('/users', function () {
    return view('users');
});

Route::post('/users', 'GeneratorController@processUsersForm');

Route::get('/passwords', 'GeneratorController@showPasswordForm');

Route::post('/passwords', 'GeneratorController@processPasswordForm');