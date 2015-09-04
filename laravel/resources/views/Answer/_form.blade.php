<div class="form-group" name="answer">
    {!! Form::label('answer','Answer:')!!}
    {!!    Form::textarea('answer',null,['class'=>'form-control','id'=>'answer'])   !!}
</div>
<div class="form-group">
    {!! Form::submit($SubmitButtonText,['class'=>'btn btn-primary form-control'])!!}
</div>