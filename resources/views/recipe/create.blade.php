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

@section('custom-scripts')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
@endsection