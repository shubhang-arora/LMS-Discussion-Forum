<div class="form-group">
    {!! Form::label('schools_id','Select School:')!!}
    {!! Form::select('schools_id',$schools,null,['id'=>'school_id','class'=>'form-control'])!!}
</div>
<div class="form-group">
    {!! Form::label('departments_id','Select Department:')!!}
    {!! Form::select('departments_id',$departments,null,['id'=>'department_id','class'=>'form-control'])!!}
</div>
<div class="form-group">
    {!! Form::label('designation_id','Select Designation:')!!}
    {!! Form::select('designation_id',$designations,null,['id'=>'designation_id','class'=>'form-control'])!!}
</div>
<div class="form-group">
    {!! Form::label('user_id','Select User:')!!}
    {!! Form::select('user_id',$users,null,['id'=>'user_id','class'=>'form-control'])!!}
</div>
<div class="form-group">
    {!! Form::submit($SubmitButtonText,['class'=>'btn btn-primary form-control'])!!}
</div>