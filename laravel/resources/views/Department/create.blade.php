@extends('app')

@section('content')
    <h1>Create Department</h1>
    <hr>
    {!! Form::open() !!}
    @include('Department._form',['SubmitButtonText'=>'Create Department'])
    {!! Form::close() !!}
    @include('errors.list')

@endsection