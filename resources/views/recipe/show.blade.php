@extends('layouts.app')

@section('content')
    <article class="container">
        <div class="row">
            <div class="col-lg-12">
                @include('components.card', [
                    'image' => $recipe->image,
                    'title' => $recipe->name,
                    'subtitles' => [
                        [
                            'icon' => '<span class="icon-user"></span>',
                            'text' => $recipe->user->name
                        ],[
                            'icon' => '<span class="icon-date"></span> Created ',
                            'text' => $recipe->created_at->diffForHumans()
                        ]
                    ]
                ])
            </div>
        </div>
        <div class="row" style="margin-top: 25px">
            <div class="col-lg-9">
                <h3>Directions</h3>
                {!!  $recipe->description !!}
            </div>
            <div class="col-lg-3">
                <h3>Ingredients</h3>
                <ul class="list-unstyled">
                    @foreach($recipe->ingredients as $ingredient)
                    <li>
                        <strong>{{ $ingredient->name }}</strong>
                        <p>{{ $ingredient->pivot->amount }}{{ $ingredient->unit }}, ~{{ $ingredient->actual_price }}€</p>
                    </li>
                    @endforeach
                    <hr>
                    <li>
                        <strong>Total Costs:</strong> ~{{ $recipe->actual_price }}€
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="row form-group">
            <div class="col-lg-6">
                <a type="button" href="{{ route('shopping-list.recipe', $recipe->id) }}" class="btn btn-secondary btn-lg btn-block"><span class="icon-article"></span> Generate Shopping List</a>
            </div>
            <div class="col-lg-6">
                <a type="button" class="btn btn-secondary btn-lg btn-block"><span class="icon-archive"></span> Take Item from Storage</a>
           </div>
        </div>
        <div class="row form-group">
            @if($recipe->isAllowedToBeSeenBy(Auth::user()))
                <div class="col-lg-12">
                    <a type="button" href="{{ route('recipe.edit', $recipe->id) }}" class="btn btn-secondary btn-lg btn-block">Edit</a>
                </div>
            @endif
        </div>
    </article>
@endsection