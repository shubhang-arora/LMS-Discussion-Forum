@extends('app')

@section('content')
<h1>{{$question->question}}</h1>
@if(\Illuminate\Support\Facades\DB::table('answers')->where('user_id',Auth::user()->id)->where('questions_id',$question->id)->count()==1)
    <a href="{{action('QuestionsAnswersController@edit',[$question->id,$aid])}}">Edit Your Answer</a>
@else
    <a href="{{action('QuestionsAnswersController@write',$question->id)}}">Write Answer</a>
@endif

<hr>
    <a id="comment">Comment</a>
    <div class="writeComment">
        {!! Form::open()!!}
        <div class="form-group">
            {!!    Form::text('comment',null,['class'=>'comment form-control'])   !!}
        </div>
        {!!Form::close()!!}
        <div class="form-group">
            {!!    Form::submit("Post Comment",['class'=>'send-btn'])    !!}
        </div>
    </div>
<hr>

        @unless($answers->isEmpty())

            <article>
                    @foreach($answers as $answer)
                    <a href="{{action('QuestionsAnswersController@show',[$question->id,$answer->id])}}">{!!$answer->answer!!}</a>
                        <br>
                    {!! Form::open() !!}
                    @if($answer->liked())
                        <button type="button" id="{{$answer->id}}" class="vote-answer">{{$answer->likeCount}} | Upvoted</button>
                    @else
                        <button type="button" id="{{$answer->id}}" class="vote-answer">{{$answer->likeCount}} | Upvote</button>
                    @endif
                    {!! Form::close() !!}
                    <hr>
                    @endforeach

            </article>
        @endunless

@stop