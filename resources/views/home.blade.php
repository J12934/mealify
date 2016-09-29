@extends('layouts.app')

@section('content')
<article class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>New Recipes</h2>
        </div>
    </div>
    <div class="row">
        @foreach($recipes as $recipe)
        <div class="col-xs-12 col-md-6 col-lg-4">
            @include('components.card', [
                'title' => $recipe->name,
                'image' => $recipe->image,
                'user'  => $recipe->user->name,
            ])
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-lg-12 text-xs-center text-md-right">
            <a href="#" class="disovery-link">
                Discover more Recipes <span class="icon-arrow-right"></span>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h2>New Meals</h2>
        </div>
    </div>
    <div class="row">
        @foreach($recipes as $recipe)
        <div class="col-xs-12 col-md-6 col-lg-4">
            @include('components.card', [
                'title' => $recipe->name,
                'image' => $recipe->image,
                'user'  => $recipe->user->name,
            ])
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-lg-12 text-xs-center text-md-right">
            <a href="#" class="disovery-link">
                Discover more Recipes <span class="icon-arrow-right"></span>
            </a>
        </div>
    </div>

</article>
@endsection
