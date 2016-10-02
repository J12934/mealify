@extends('layouts.app')

@section('content')
    <article class="container">
            {{ Form::open(['route' => ['recipe.store'], 'method' => 'post']) }}
                @include('recipe._form')
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-secondary btn-lg btn-block"><span class="icon-article"></span> Save</button>
                    </div>
                </div>
            {!! Form::close() !!}
    </article>
@endsection