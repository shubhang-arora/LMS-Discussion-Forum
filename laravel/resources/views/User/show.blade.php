@extends('app')

@section('content')
    <hr>
    <h3><a href="{{action('UsersController@show',$user->id)}}">{{$user->name}}</a></h3>
    <ul>
        <li>{{$user->email}}</li>
    </ul>
    <hr>
    @if(DB::table('admin')->where('user_id',Auth::user()->id)->count()==1)
        <h3>Admin Controls</h3>
    @endif
@endsection