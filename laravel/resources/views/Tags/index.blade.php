@extends('app')

@section('content')

    <h1>Tags</h1>

    <hr/>
    @unless($tags->isEmpty())
        <ul>
            <tag>
                @foreach($tags as $tag)
                 <li><a href="{{action('QuestionsController@TagQuestions',$tag->id)}}">{{$tag->name}}</a></li>
                    <br>
                @endforeach
            </tag>
        </ul>
    @endunless

@stop