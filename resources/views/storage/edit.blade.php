@extends('layouts.app')

@section('content')
    <article class="container">
        <div class="row">
            <div class="col-lg-12">
                {{ Form::model($storage, ['route' => ['storage.update', $storage->id], 'method' => 'patch']) }}
                    @include('storage._form', [
                        'url' => env('APP_URL', 'http://localhost/mealify/public') . '/api/storage/' . $storage->id
                    ])
                    {!! Form::submit('Update', ['class' => 'btn btn-secondary btn-block']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </article>
@endsection