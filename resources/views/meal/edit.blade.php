@extends('layouts.app')

@section('content')
    <article class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Edit your Meal</h1>
            </div>
        </div>
        {{ Form::model($meal, ['route' => ['meal.update', $meal->id], 'method' => 'patch']) }}
        @include('meal._form', [
            'recipeUrl' => route('api.meal.recipes', $meal->id)
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