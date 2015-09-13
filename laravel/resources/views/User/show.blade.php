@extends('app')

@section('content')
    <hr>
    <h3><a href="{{action('UsersController@show',$user->id)}}">{{$user->name}}</a></h3>
    <ul>
        <li>{{$user->email}}</li>
    </ul>
@endsection