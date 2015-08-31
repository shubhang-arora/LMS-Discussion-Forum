@extends('app')

@section('content')
<h1>{{$question->question}}</h1>

<hr>
<hr>

        @unless($answers->isEmpty())

            <article>
                    @foreach($answers as $answer)
                        {{$answer->answer}}
                        <br>
                    <hr>
                    @endforeach

            </article>
        @endunless

@stop