<div class="form-group">
    {!! Form::label('schools_id','Select School:')!!}
    {!! Form::select('schools_id',$schools,null,['id'=>'school_id','class'=>'form-control'])!!}
</div>
<div class="form-group">
    {!! Form::label('department_name','Department Name:')!!}
    {!! Form::text('department_name',null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
    {!! Form::submit($SubmitButtonText,['class'=>'btn btn-primary form-control'])!!}
</div>