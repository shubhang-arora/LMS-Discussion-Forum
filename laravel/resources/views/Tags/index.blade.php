@extends('app')

@section('content')

    <h1>Tags</h1>
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
    @unless($tags->isEmpty())
        <ul>
            <tag>
                @foreach($tags as $tag)
                 <li>{{$tag->name}}</li>
                    <br>
                @endforeach
            </tag>
        </ul>
    @endunless

@stop