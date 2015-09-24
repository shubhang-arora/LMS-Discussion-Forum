
<div class="form-group">
    {!! Form::label('departments_id','Select Department:')!!}
    {!! Form::select('departments_id',$departments,null,['id'=>'school_id','class'=>'form-control'])!!}
</div>
<div class="form-group">
    {!! Form::label('course_id','Course Id:')!!}
    {!! Form::text('course_id',null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
    {!! Form::label('course_name','Course Name:')!!}
    {!! Form::text('course_name',null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
    {!! Form::submit($SubmitButtonText,['class'=>'btn btn-primary form-control'])!!}
</div>
