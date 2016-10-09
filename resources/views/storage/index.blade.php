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
                            <h4 class="card-title">
                                <strong>{{ $storage->name }}</strong>
                                <span class="pull-xs-right">
                                    Ingredients
                                </span>
                            </h4>
                            {{ Form::model($storage, ['route' => ['storage.update', $storage->id], 'method' => 'patch']) }}
                                @include('storage._form', [
                                    'url' => 'api/storage/' . $storage->id
                                ])
                                {!! Form::submit('Update', ['class' => 'btn btn-secondary btn-block']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">
                            <strong>Create a new Storage</strong>
                        </h4>
                        {{ Form::open(['route' => ['storage.store'], 'method' => 'post']) }}
                            <div class="form-group">
                                {!! Form::label('name', 'Name') !!}
                                {!! Form::text('name', null, [ 'class' => 'form-control' ]) !!}
                            </div>
                            {!! Form::submit('Create', ['class' => 'btn btn-secondary btn-block']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </article>
@endsection