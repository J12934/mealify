@extends('layouts.app')

@section('content')
    <article class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Your Storage Units</h2>
            </div>
        </div>
        <div class="row">
            @foreach($user->storages as $storage)
            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title"><h3>{{ $storage->name }}</h3></h4>
                    </div>
                    <div class="list-group list-group-flush">
                        @foreach($storage->ingredients as $ingredient)
                            <a class="list-group-item" href="{{ route('storage.ingredient.edit', [ 'storage' => $storage->id, 'ingredient' => $ingredient->id ]) }}">
                                {{ $ingredient->name }}
                                <span class="pull-xs-right">
                                    {{ (float) $ingredient->pivot->amount }}{{$ingredient->unit}}
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </article>
@endsection