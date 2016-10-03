@extends('layouts.app')

@section('content')
    <article class="container">
        {{ Form::model( $recipe, ['route' => ['recipe.update', $recipe->id], 'method' => 'patch']) }}
        @include('recipe._form', [
            'ingredientUrl' => 'api/recipe/ingredients/' . $recipe->id,
            'categoriesUrl' => 'api/recipe/tags/' . $recipe->id
        ])
        <div class="row">
            <div class="col-lg-12">
                <button type="submit" class="btn btn-secondary btn-lg btn-block"><span class="icon-article"></span> Update</button>
            </div>
        </div>
        {!! Form::close() !!}
    </article>
@endsection

@section('custom-scripts')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
@endsection