@extends('app')

@section('content')
    <h1>Create Designation</h1>
    <hr>
    {!! Form::open() !!}
        @include('Designation._form',['SubmitButtonText'=>'Create Designation'])
    {!! Form::close() !!}
    @include('errors.list')

@endsection