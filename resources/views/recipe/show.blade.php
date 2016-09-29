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
                {{-- TODO --}}
            </div>
        </div>
    </article>
@endsection