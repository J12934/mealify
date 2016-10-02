@extends('layouts.app')

@section('content')
    <article class="container">
        <div class="row">
            <div class="col-lg-12">
                @include('components.card-row')
            </div>
            <div class="col-lg-6 push-lg-6">
                <h1>Shopping List</h1>
                <ul>
                    @foreach($diff as $item)
                        <li>
                            <strong>{{ $item['name'] }}</strong>
                            <em>{{ $item['amount'] }}{{ $item['unit'] }}</em>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-6 pull-lg-6">
                <h1>Directions</h1>
                {!! $meal->description !!}
            </div>
        </div>
    </article>
@endsection