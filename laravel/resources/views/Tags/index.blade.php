@extends('app')

@section('content')

    <h1>Tags</h1>

    <hr/>
    @unless($tags->isEmpty())
        <ul>
            <tag>
                @foreach($tags as $tag)
                 <li>{{$tag->name}}</li>
                    <br>
                @endforeach
            </tag>
        </ul>
    @endunless

@stop