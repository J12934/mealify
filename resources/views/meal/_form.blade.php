<div class="row" style="margin-top: 25px">
    <div class="col-lg-9">
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, [ 'class' => 'form-control' ]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description', 'Description') !!}
            {!! Form::textarea('description', null, [ 'class' => 'form-control' ]) !!}
        </div>
    </div>
    <div class="col-lg-3">
        <h3>Included Recipes</h3>
        <ul class="list-unstyled">
            <recipe-selector
                    @if(isset($recipeUrl)) api="{{ $recipeUrl }}" @endif>
            </recipe-selector>
        </ul>
    </div>
</div>
<hr>