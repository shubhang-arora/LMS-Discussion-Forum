@extends('app')

@section('content')

    <h1>Edit Courses</h1>

    <hr/>

    {!! Form::model($courses,['method' => 'PATCH', 'action' => ['CoursesController@update', $courses->id]]) !!}
         @include('Course._form',['SubmitButtonText'=>'Edit Course'])
    {!! Form::close() !!}
    @include('errors.list')

@stop