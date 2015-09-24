@extends('app')

@section('content')
    <h1>Schools</h1>
    <hr>

    @foreach($schools as $school)
        <article>

            {{$school->school_name}}
            <br>
        </article>
    @endforeach
@endsection