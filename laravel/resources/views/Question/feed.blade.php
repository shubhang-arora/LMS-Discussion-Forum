@extends('app')

@section('content')

<h1>Questions</h1>

<hr/>
<hr/>
<a href={{action('QuestionsController@ask')}}>Ask Questions</a>
<hr/>
@foreach($questions as $question)
    <article>
        <h2><a href={{action('QuestionsController@show',$question->id)}}>{{$question->question}}</a></h2>
        <div class="body">{!!$question->description!!}</div>
        <div class="footer">{{$question->created_at->diffForHumans()}}</div>
        {{$question->answers->count()}} Response
        <br>
        {!! Form::open() !!}
        <button type="button" id="{{$question->id}}" class="upvote-ques">Upvote</button>
        <button type="button">Downvote</button>
        {!! Form::close() !!}
        <hr>
    </article>
@endforeach

@stop
