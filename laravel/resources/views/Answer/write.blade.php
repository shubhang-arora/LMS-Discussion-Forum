@extends('app')

@section('content')

<h1>Write Answer</h1>
<hr/>
<h1>{{$question->question}}</h1>

{!! Form::model($question,['action' => ['QuestionsAnswersController@store',$question->slug]]) !!}
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
