@extends('app')

@section('content')

    <h1>Ask Question</h1>
    <hr/>

    {!! Form::open(['url' => 'questions']) !!}
    @include('Question._form',['SubmitButtonText'=>'Ask Question'])
    {!! Form::close() !!}
    @include('errors.list')

@stop