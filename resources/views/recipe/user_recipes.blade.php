@extends('layouts.app')

@section('content')
    <article class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Recipes you have shared</h2>
            </div>
        </div>
        <div class="row">
            @foreach($recipes as $recipe)
                <div class="col-xs-12 col-md-6 col-lg-4">
                    <a href="{{ route('recipe.show', $recipe->id) }}" class="media-card-link">
                        @include('components.card')
                    </a>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-lg-12 text-xs-center">
                {{ $recipes->links() }}
            </div>
        </div>
    </article>
@endsection