@extends('app')

@section('content')
    @foreach($schools as $school)
        {{$school->school_name}}
        <br>
    @endforeach
@endsection