@extends('layouts.app')

@section('content')
    <article class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>All Meals, sorted by Date</h2>
            </div>
        </div>

        @foreach($meals as $meal)
            <a class="media-card-link" href="{{ route('meal.show', $meal->id) }}">
                @include('components.card-row', compact( $meal ))
            </a>
        @endforeach

        <div class="row">
            <div class="col-lg-12 text-xs-center">
                {{ $meals->links() }}
            </div>
        </div>
    </article>
@endsection