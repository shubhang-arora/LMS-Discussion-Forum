@extends('app')

@section('content')

    <h1>{!!$question->question!!}</h1>
    <hr>
    <hr>

    <h4>{!!$answer->answer!!}</h4>
    @if($aid!=-1)
        <a href="{{action('QuestionsAnswersController@edit',[$question->id,$aid])}}">Edit</a>
    @endif
    <a id="comment">Comment</a>
    <div class="writeComment">
        {!!    Form::open()    !!}
        <div class="form-group">
            {!!    Form::text('comment',null,['class'=>'comment form-control'])   !!}
        </div>
        {!!    Form::close()    !!}
        <div class="form-group">
            {!!    Form::submit("Post Comment",['class'=>'send-btn'])    !!}
        </div>
    </div>

@stop