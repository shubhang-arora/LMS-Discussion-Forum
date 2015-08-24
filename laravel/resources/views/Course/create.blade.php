@extends('app')

@section('content')

    <h1>Add Courses</h1>
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

    {!! Form::open(['url' => 'courses']) !!}
        @include('Course._form',['SubmitButtonText'=>'Add Course'])
    {!! Form::close() !!}
    @include('errors.list')

@stop