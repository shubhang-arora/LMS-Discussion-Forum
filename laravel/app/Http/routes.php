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

Route::get('/','QuestionsController@index');

// Question routes...
Route::get('questions/ask', 'QuestionsController@ask');

Route::resource('questions','QuestionsController',
    ['except' => ['create', 'index']]);

Route::resource('tags','TagsController');

// Answer routes...
Route::resource('questions.answers','QuestionsAnswersController',
    ['except' => 'show']);

// Profile routes...
Route::resource('users','UsersController',
    ['except' => ['create', 'store']]);


// Course routes...
Route::resource('courses','CoursesController');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');