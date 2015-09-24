@extends('app')

@section('content')
    <h1>Create Designation</h1>
    <hr>
    {!! Form::open() !!}
    @include('School._form',['SubmitButtonText'=>'Create School'])
    {!! Form::close() !!}
    @include('errors.list')

@endsection