@extends('app')

@section('content')

    <h1>Courses</h1>
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

    <course>
        @foreach($courses as $course)



            {{$course->course_name}}:<b>{{$course->course_id}}</b>
            <br>
            <br>
            <br>
        @endforeach
    </course>
@stop