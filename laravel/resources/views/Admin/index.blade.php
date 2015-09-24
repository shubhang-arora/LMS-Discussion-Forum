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
        <li><a href="{{action('UsersController@index')}}">View Users</a></li>
        <li><a href="{{action('DesignationController@create')}}">Create Designation</a></li>
        <li><a href="{{action('SchoolController@create')}}">Create Schools</a></li>
        <li><a href="{{action('SchoolController@index')}}">View Schools</a></li>
        <li><a href="{{action('DepartmentController@create')}}">Create Department</a></li>
        <li><a href="{{action('DesignationController@assign')}}">Assign Designations</a></li>
    </ul>
@endsection