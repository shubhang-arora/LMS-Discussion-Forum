
@extends('app')

@section('content')
    <h1>Users</h1>
    <hr>
    <ol>
    @foreach($users as $user)

        <article>
            <li><a href="{{action('UsersController@show',$user->id)}}">{{$user->name}}  ({{$user->email}})</a></li>
        </article>

    @endforeach
    </ol>

@endsection