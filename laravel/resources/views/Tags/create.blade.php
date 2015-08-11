@extends('app')

@section('content')

    <h1>Add Tags</h1>
    <hr/>

    {!! Form::open(['url' => 'tags']) !!}
    @include('Tags._form',['SubmitButtonText'=>'Add tag'])
    {!! Form::close() !!}
    @include('errors.list')

@stop