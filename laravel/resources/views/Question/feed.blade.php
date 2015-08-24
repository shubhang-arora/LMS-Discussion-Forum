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
<hr/>
<a href={{action('QuestionsController@ask')}}>Ask Questions</a>
<hr/>
@foreach($questions as $question)
    <article>
        <h2><a href={{action('QuestionsController@show',$question->id)}}>{{$question->question}}</a></h2>
        <div class="body">{{$question->description}}</div>
        <div class="footer">{{$question->created_at->diffForHumans()}}</div>
    </article>
@endforeach

@stop
