@extends('app')

@section('content')

<h1>Write Answer</h1>
<hr/>
<h1>{{$question->question}}</h1>

{!! Form::model($question,['action' => ['QuestionsAnswersController@store',$question->id]]) !!}
@include('Answer._form',['SubmitButtonText'=>'Submit Answer'])
{!! Form::close() !!}
@include('errors.list')
@endsection
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
