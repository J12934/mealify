@extends('layouts.app')

@section('content')
    <article class="container">
        <div class="row">
            <div class="col-lg-12">
                @include('components.card-row', compact( $meal ))
            </div>
            <div class="col-lg-9">
                <h2>Description</h2>
                {{ $meal->description }}
            </div>
            <div class="col-lg-3">
                <h2>All Ingredients</h2>
                {{-- TODO Meal Ingredients --}}
                <ul class="list-unstyled">
                    @foreach($meal->getIngredients() as $ingredient)
                        <li>
                            <strong>{{ $ingredient['name'] }}</strong>
                            <p>{{ $ingredient['amount'] }}{{ $ingredient['unit'] }}, ~{{ $ingredient['price'] }}€</p>
                        </li>
                    @endforeach
                    <hr>
                    <li>
                        <strong>Total Costs:</strong> ~{{ $meal->actual_price }}€
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-6">
                <a type="button" class="btn btn-secondary btn-lg btn-block"><span class="icon-article"></span> Generate Shopping List</a>
            </div>
            <div class="col-lg-6">
                <a type="button" class="btn btn-secondary btn-lg btn-block"><span class="icon-archive"></span> Take Item from Storage</a>
            </div>
        </div>
    </article>
@endsection