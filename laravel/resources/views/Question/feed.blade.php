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
        @if($question->liked())
            <button type="button" id="{{$question->id}}" class="vote-question">{{$question->likeCount}} | Upvoted</button>
        @else
            <button type="button" id="{{$question->id}}" class="vote-question">{{$question->likeCount}} | Upvote</button>
        @endif
        {!! Form::close() !!}
        <hr>
    </article>
@endforeach

@stop
