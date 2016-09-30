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
                        'subtitles' => [
                                    [
                                        'icon' => '<span class="icon-user"></span>',
                                        'text' => $recipe->user->name
                                    ],[
                                        'icon' => '<span class="icon-date"></span> Created ',
                                        'text' => $recipe->created_at->diffForHumans()
                                    ]
                                ],
                        'url'   => route('recipe.show', $recipe->id)
                    ])
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-lg-12 text-xs-center text-md-right">
                <a href="{{ route('recipe.index') }}" class="disovery-link">
                    Discover more Recipes <span class="icon-arrow-right"></span>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <h2>New Meals</h2>
            </div>
        </div>

        @foreach($meals as $meal)
            <div class="row card-row">
                <div class="col-lg-12 card-row-header">
                    <p class="card-row-heading">{{ $meal->name }}</p>
                    <p class="card-row-subtitle"><span class="icon-user"></span> {{ $meal->user->name }} <span class="icon-date"></span> {{ $meal->created_at->diffForHumans() }}</p>
                </div>
                @foreach($meal->recipes as $recipe)
                    <div class="col-xs">
                        @include('components.card', [
                        'title' => $recipe->pivot->title,
                        'image' => $recipe->image,
                        'subtitles' => [
                                    [
                                        'icon' => '<span class="icon-user"></span>',
                                        'text' => $recipe->user->name
                                    ],[
                                        'icon' => '<span class="icon-date"></span> Created ',
                                        'text' => $recipe->created_at->diffForHumans()
                                    ]
                                ],
                        'url'   => route('recipe.show', $recipe->id)
                        ])
                    </div>
                @endforeach
            </div>
        @endforeach

        <div class="row">
            <div class="col-lg-12 text-xs-center text-md-right">
                <a href="#" class="disovery-link">
                    Discover more Meals <span class="icon-arrow-right"></span>
                </a>
            </div>
        </div>

    </article>
@endsection
