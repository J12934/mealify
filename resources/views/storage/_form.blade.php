<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, [ 'class' => 'form-control' ]) !!}
</div>
<div class="form-group">
    <h2>Ingredients</h2>
    <ingredient-selector
        @if(isset($url))api="{{ $url }}@endif">
    </ingredient-selector>
</div>