@extends('app')

@section('content')
    <h1>Admin</h1>
    <hr>
    <h4>Links</h4>
    <ul>
        <li><a href="{{action('CoursesController@create')}}">Create Courses</a></li>
        <li><a href="{{action('CoursesController@index')}}">View Courses</a></li>
        <li><a href="{{action('TagsController@create')}}">Create Tags</a></li>
        <li><a href="{{action('TagsController@index')}}">View Tags</a></li>
    </ul>
@endsection