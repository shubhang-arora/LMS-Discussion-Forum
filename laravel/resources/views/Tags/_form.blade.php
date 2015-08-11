
<div class="form-group">
    {!! Form::label('name','Tag Name:')!!}
    {!! Form::text('name',null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
    {!! Form::label('courses_id','Select Course:')!!}
    {!! Form::select('courses_id',$courses,null,['id'=>'course_list','class'=>'form-control'])!!}
</div>

<div class="form-group">
    {!! Form::submit($SubmitButtonText,['class'=>'btn btn-primary form-control'])!!}
</div>

@section('footer')
    <script>
        $('#course_list').select2({
            placeholder: "Choose a Course",
            allowClear: true
        });

    </script>
@endsection
