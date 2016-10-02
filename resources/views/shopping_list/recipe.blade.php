@extends('layouts.app')

@section('content')
    <article class="container">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route('recipe.show', $recipe->id) }}">
                    @include('components.card')
                </a>
            </div>
            <div class="col-lg-4 push-lg-8">
                <h1>Your Shopping List</h1>
                <ul class="list-unstyled">
                    @foreach($diff['list'] as $item)
                        <li>
                            <strong>{{ $item['name'] }}</strong>
                            <p>{{ $item['amount'] }}{{ $item['unit'] }}, ~{{ $item['absulute_price'] }}€</p>
                        </li>
                    @endforeach
                    <hr>
                    <li>
                        <strong>Total Costs:</strong> ~{{ $diff['total_costs'] }}€
                    </li>
                </ul>
            </div>
            <div class="col-lg-8 pull-lg-4">
                <h1>Directions</h1>
                {!! $recipe->description !!}
            </div>
        </div>
    </article>
@endsection