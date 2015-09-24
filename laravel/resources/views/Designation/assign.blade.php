@extends('app')

@section('content')
    {!! Form::open() !!}
    @include('Designation._assignForm',['SubmitButtonText'=>'Assign Designation'])
    {!! Form::close() !!}
    @include('errors.list')
@endsection