@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-columns">
        @foreach($recipes as $recipe)
            <div class="card card-media">
                <img class="card-img w-100" src="{{ $recipe->image }}" alt="Card image cap">
                <div class="card-img-overlay flex flex-items-xs-bottom">
                    <h4 class="card-title text-white flex">{{ $recipe->name }}</h4>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
