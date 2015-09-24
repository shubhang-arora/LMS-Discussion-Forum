<div class="form-group">
    {!! Form::label('school_name','School Name:')!!}
    {!! Form::text('school_name',null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
    {!! Form::submit($SubmitButtonText,['class'=>'btn btn-primary form-control'])!!}
</div>