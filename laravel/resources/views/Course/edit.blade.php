@extends('app')

@section('content')

    <h1>Edit Courses</h1>
    @if (Auth::check())
        <p align="right">
            Welcome {{Auth::user()->name}}
            <br>
            <a href={{action('Auth\AuthController@getLogout')}}>Logout</a>
        </p>
    @endif
    @unless(Auth::check())
        <p align="right">
            <a href={{action('Auth\AuthController@postLogin')}}>Login</a>
            <a href={{action('Auth\AuthController@postRegister')}}>Register</a>
        </p>

    @endunless
    <hr/>

    {!! Form::model($courses,['method' => 'PATCH', 'action' => ['CoursesController@update', $courses->id]]) !!}
         @include('Course._form',['SubmitButtonText'=>'Edit Course'])
    {!! Form::close() !!}
    @include('errors.list')

@stop