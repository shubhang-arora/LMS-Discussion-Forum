@extends('app')

@section('content')

<h1>Write Answer</h1>
<hr/>
<h1>{{$question->question}}</h1>
{!! Form::open(['url' => 'questions/{questions}/answers']) !!}
@include('Answer._form',['SubmitButtonText'=>'Submit Answer'])
{!! Form::close() !!}
@include('errors.list')

@stop