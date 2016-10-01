@extends('layouts.app')

@section('content')
    <article class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Amount of {{ $ingredient->name }} in {{ $storage->name }}</h2>
            </div>
            <div class="col-lg-12">
                {!! Form::model( $ingredient, [ 'url' => route('storage.ingredient.update', [ 'storage' => $storage->id, 'ingredient' => $ingredient->id ]),
                                                'method' => 'patch'
                ]) !!}
                    @include('storage.ingredient._form', compact($ingredient))

                    <div class="form-group">
                        {!! Form::submit('Update Amount', ['class' => 'btn btn-secondary btn-block']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </article>
@endsection

