@extends('app')

@section('content')

    <h1>Edit Question</h1>
    <hr/>


    {!! Form::model($questions,['method' => 'PATCH', 'action' => ['QuestionsController@update', $questions->id]]) !!}
    @include('Question._form',['SubmitButtonText'=>'Edit Question'])
    {!! Form::close() !!}
    @include('errors.list')

@stop