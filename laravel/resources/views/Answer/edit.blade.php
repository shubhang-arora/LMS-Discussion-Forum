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

                toolbar: [
                    //[groupname, [button list]]

                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['insert',['picture', 'link', 'table', 'hr']],
                ]
            });
        });
    </script>
@endsection
@stop