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
Route::get('questions/tagged/{tag}','QuestionsController@TagQuestions');
Route::get('questions/courses/{course}','QuestionsController@CourseQuestions');
Route::get('questions/{questions}/answers/write','QuestionsAnswersController@write');
Route::resource('questions','QuestionsController',
    ['except' => ['create', 'index']]);

// Answer routes...
Route::resource('questions.answers','QuestionsAnswersController',
    ['except' => ['create']]);

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

//Comments routes...
Route::resource('questions.comments','QuestionCommentsController');
Route::resource('questions.answers.comments','AnswerCommentsController');

// Course routes...
Route::resource('courses','CoursesController',
    ['except'   =>  ['create']]);

// Profile routes...
Route::resource('users','UsersController',
    ['except' => ['create', 'store']]);

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//Tag routes...
Route::resource('tags','TagsController',
    ['except'   => ['create']]);

//Vote route...

Route::post('upvote/question','QuestionVotesController@upVote');
Route::post('upvote/answer','AnswerVotesController@upVote');

//admin route...
Route::get('admin','AdminController@index');
Route::get('admin/create/courses','CoursesController@create');
Route::get('admin/create/tags','TagsController@create');


