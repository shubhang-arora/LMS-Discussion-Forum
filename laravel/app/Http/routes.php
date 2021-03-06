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
// Index route...
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
    ['except' => ['create', 'store', 'index']]);

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//Tag routes...
Route::resource('tags','TagsController',
    ['except'   => ['create']]);

//Vote route...
Route::post('upvote/question','QuestionVotesController@upVote');
Route::post('downvote/question','QuestionVotesController@downVote');
Route::post('upvote/answer','AnswerVotesController@upVote');
Route::post('downvote/answer','AnswerVotesController@downVote');

//admin route...
Route::get('admin','AdminController@index');
Route::get('admin/create/courses','CoursesController@create');
Route::get('admin/create/tags','TagsController@create');
Route::get('admin/users','UsersController@index');
Route::get('admin/create/designation','DesignationController@create');
Route::post('admin/create/designation','DesignationController@store');
Route::get('admin/create/school','SchoolController@create');
Route::post('admin/create/school','SchoolController@store');
Route::get('admin/create/department','DepartmentController@create');
Route::post('admin/create/department','DepartmentController@store');
Route::get('admin/assign/designation','DesignationController@assign');
Route::post('admin/assign/designation','DesignationController@assigned');

//Designation route...
Route::resource('designation','DesignationController',
    ['only'   => ['index', 'show']]);

//School route...
Route::resource('school','SchoolController',
    ['only' => ['index', 'show']]);

//Department route...
Route::resource('department','DepartmentController',
    ['only' =>  ['index', 'show']]);
