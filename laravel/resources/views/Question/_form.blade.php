<div class="form-group">
    {!! Form::label('courses_id','Select Course:')!!}
    {!! Form::select('courses_id',$courses,null,['id'=>'courses_id','class'=>'form-control'])!!}
</div>

<div class="form-group">
    {!! Form::label('question','Question:')!!}
    <div id="summernote"></div>
</div>

<div class="form-group">
    {!! Form::label('description','Description:')!!}
    {!! Form::text('description',null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
    {!! Form::label('tag_list','Tags:')!!}
    {!! Form::select('tag_list[]',$tags,null,['id'=>'tag_list','class'=>'form-control','multiple'])!!}
</div>
<div class="form-group">
    {!! Form::submit($SubmitButtonText,['class'=>'btn btn-primary form-control'])!!}
</div>

@section('footer')
    <script>
        $('#courses_id').select2({
            placeholder: "Choose a Course",
            allowClear: true
        });

        $('#tag_list').select2({
            placeholder: "Choose a Tag for the Question",
            tags: true
        });
    </script>
@endsection
