@extends('layouts.app')

@section('content')
    <article class="container">
        <form action="{{ route('recipe.store') }}" method="post">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-lg-12">
                    <h1>Share a Recipe with the World</h1>
                </div>
            </div>
            <div class="row" style="margin-top: 25px">
                <div class="col-lg-9">
                    <div class="form-group">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', null, [ 'class' => 'form-control' ]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('image', 'Image URL') !!}
                        {!! Form::text('image', null, [ 'class' => 'form-control' ]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Directions') !!}
                        {!! Form::textarea('description', null, [ 'class' => 'form-control' ]) !!}
                    </div>
                </div>
                <div class="col-lg-3">
                    <h3>Ingredients</h3>
                    <ul class="list-unstyled">
                        <ingredient-selector></ingredient-selector>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-secondary btn-lg btn-block"><span class="icon-article"></span> Save</button>
                </div>
            </div>
        </form>
    </article>
@endsection