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
                    <a href="{{ route('storage.edit', $storage->id ) }}" class="disovery-link">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">
                                    {{ $storage->name }}
                                    <span class="pull-xs-right"><span class="icon-arrow-right"></span></span>
                                </h4>
                                <small class="tag tag-info">{{ $storage->ingredients->count() }} Ingredients</small>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            <div class="col-lg-4 col-md-6 col-xs-12">
                <a href="{{ route('storage.create' ) }}" class="disovery-link">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">
                                Create a new Storage
                                <span class="pull-xs-right"><span class="icon-arrow-right"></span></span>
                            </h4>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </article>
@endsection