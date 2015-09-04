@extends('app')

@section('content')

    <h1>Edit Answer</h1>
    <hr/>
    <h1>{{$question->question}}</h1>
    {!! Form::model($answer,['method' => 'PATCH','action' => ['QuestionsAnswersController@update',$question->id,$answer->id]]) !!}
    @include('Answer._form',['SubmitButtonText'=>'Edit Answer'])
    {!! Form::close() !!}
    @include('errors.list')

@section('footer')
    <script>
        $(document).ready(function() {
            $('#answer').summernote({
                height: 300,

                minHeight: null,
                maxHeight: null,

                focus: true,

            });
        });
    </script>
@endsection
@stop