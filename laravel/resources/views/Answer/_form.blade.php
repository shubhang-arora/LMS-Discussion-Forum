<div class="form-group">
    {!! Form::label('answer','Answer:')!!}
    {!! Form::textarea('answer',null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
    {!! Form::submit($SubmitButtonText,['class'=>'btn btn-primary form-control'])!!}
</div>