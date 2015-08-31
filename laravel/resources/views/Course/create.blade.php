@extends('app')

@section('content')

    <h1>Add Courses</h1>

    <hr/>

    {!! Form::open(['url' => 'courses']) !!}
        @include('Course._form',['SubmitButtonText'=>'Add Course'])
    {!! Form::close() !!}
    @include('errors.list')

@stop