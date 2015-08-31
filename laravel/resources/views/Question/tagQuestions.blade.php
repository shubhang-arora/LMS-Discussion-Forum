@extends('app')

@section('content')

    <h1>{{$tag->name}}</h1>

    <hr>
    <hr>
    @unless($questions->isEmpty())

        <article>
            @foreach($questions as $question)
                <a href="{{action('QuestionsController@show',$question->id)}}">{{$question->question}}</a>
                <br>
                <hr>
            @endforeach

        </article>
    @endunless

@stop