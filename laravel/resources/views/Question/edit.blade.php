@extends('app')

@section('content')

    <h1>Edit Question</h1>
    <hr/>

    {!! Form::model($question,['method' => 'PATCH', 'action' => ['CoursesController@update', $courses->id]]) !!}
    @include('Question._form',['SubmitButtonText'=>'Edit Question'])
    {!! Form::close() !!}
    @include('errors.list')

@stop