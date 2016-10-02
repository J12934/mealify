@extends('layouts.app')

@section('content')
    <article class="container">
        <div class="row">
            <div class="col-lg-12">
                {{ Form::open(['route' => ['storage.store'], 'method' => 'post']) }}
                    @include('storage._form')
                    {!! Form::submit('Create', ['class' => 'btn btn-secondary btn-block']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </article>
@endsection