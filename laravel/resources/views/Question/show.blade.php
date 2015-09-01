@extends('app')

@section('content')
<h1>{{$question->question}}</h1>

@if(\Illuminate\Support\Facades\DB::table('answers')->where('user_id',Auth::user()->id)->where('questions_id',$question->id)->count()==1)
    <a href="{{action('QuestionsAnswersController@edit',[$question->id,$aid])}}">Edit Your Answer</a>
@else
    <a href="{{action('QuestionsAnswersController@write',$question->id)}}">Write Answer</a>
@endif

<hr>
<hr>

        @unless($answers->isEmpty())

            <article>
                    @foreach($answers as $answer)
                    <a href="{{action('QuestionsAnswersController@show',[$question->id,$answer->id])}}">{{$answer->answer}}</a>
                        <br>
                    <hr>
                    @endforeach

            </article>
        @endunless

@stop