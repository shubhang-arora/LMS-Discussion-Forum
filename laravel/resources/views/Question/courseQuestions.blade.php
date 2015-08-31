@extends('app')

@section('content')

    <h1>{{$course->course_name}}</h1>

    <hr>
    <hr>
    @unless($questions->isEmpty())

        <article>
            @foreach($questions as $question)
                {{$question->question}}
                <br>
                <hr>
            @endforeach

        </article>
    @endunless

@stop