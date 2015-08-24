@extends('app')

@section('content')

    <h1>Edit Question</h1>
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


    {!! Form::model($question,['method' => 'PATCH', 'action' => ['QuestionsController@update', $question->id]]) !!}
    @include('Question._form',['SubmitButtonText'=>'Edit Question'])
    {!! Form::close() !!}
    @include('errors.list')

@stop