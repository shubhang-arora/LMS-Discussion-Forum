@extends('app')

@section('content')

    <h1>Edit Tag</h1>
    <hr/>

    {!! Form::model($tags,['method' => 'PATCH', 'action' => ['TagsController@update', $tags->id]]) !!}
    @include('Tags._form',['SubmitButtonText'=>'Edit Tag'])
    {!! Form::close() !!}
    @include('errors.list')

@stop