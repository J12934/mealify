@extends('layouts.app')

@section('content')
    <article class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>All Cookable Recipes</h2>
            </div>
        </div>
        <div class="row">
            @foreach($recipes as $recipe)
                <div class="col-xs-12 col-md-6 col-lg-4">
                    <a class="media-card-link" href="{{ route('recipe.show', $recipe->id) }}">
                        @include('components.card')
                    </a>
                </div>
            @endforeach
        </div>
    </article>
@endsection
