@extends('app')

@section('content')

    <h1>{!!$question->question!!}</h1>
    <hr>
    <hr>

    <h4>{!!$answer->answer!!}</h4>
    @if($aid!=-1)
        <a href="{{action('QuestionsAnswersController@edit',[$question->slug,$answer->slug])}}">Edit</a>
    @endif
    <a id="comment">Comment</a>
    <div class="writeComment">

    </div>

@stop