<div class="form-group">
    {!! Form::label('amount', 'Amount') !!}
    {!! Form::text('amount', (float) $ingredient->pivot->amount , ['class' => 'form-control']) !!}
</div>