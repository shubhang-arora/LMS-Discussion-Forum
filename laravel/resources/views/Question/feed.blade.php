@extends('app')

@section('content')

<h1>Questions</h1>

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

@foreach($questions as $question)
    <question>

     <h2><div class="body">{{$question->question}}</div></h2>
        <h4><div class="body">{{$question->description}}</div></h4>


    </question>
@endforeach

@stop
