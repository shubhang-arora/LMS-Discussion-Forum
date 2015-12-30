@extends('app')

@section('content')

<h1>{{$question->question}}</h1>
<h3>{!!$question->description!!}</h3>
@if(\Illuminate\Support\Facades\DB::table('answers')->where('user_id',Auth::user()->id)->where('questions_id',$question->id)->count()==1)
    <a href="{{action('QuestionsAnswersController@edit',[$question->slug,$aid])}}">Edit Your Answer</a>
@else
    <a href="{{action('QuestionsAnswersController@write',$question->slug)}}">Write Answer</a>
@endif

<hr>
    <a id="comment">Comment</a>
    <div class="writeComment">

    </div>
<hr>

        @unless($answers->isEmpty())

            <article>
                    @foreach($answers as $answer)
                    <a href="{{action('QuestionsAnswersController@show',[$question->slug,$answer->slug])}}">{!!$answer->answer!!}</a>
                        <br>
                    {!! Form::open() !!}
                    @if($answer->liked())
                        <button type="button" id="{{$answer->id}}" class="upvote-answer">{{$answer->likeCount}} | Upvoted</button>
                    @else
                        <button type="button" id="{{$answer->id}}" class="upvote-answer">{{$answer->likeCount}} | Upvote</button>
                    @endif
                    @if($answer->disliked())
                        <button type="button" id="{{$answer->id}}" class="downvote-answer">{{$answer->dislikeCount}} | Downvoted</button>
                    @else
                        <button type="button" id="{{$answer->id}}" class="downvote-answer">{{$answer->dislikeCount}} | Downvote</button>
                    @endif
                    {!! Form::close() !!}
                    <hr>
                    @endforeach

            </article>
        @endunless

@stop