@extends('app')

@section('content')

<h1>Questions</h1>
<hr/>

@foreach($questions as $question)
    <question>

     <h2><div class="body">{{$question->question}}</div></h2>
        <h4><div class="body">{{$question->description}}</div></h4>


    </question>
@endforeach

@stop
