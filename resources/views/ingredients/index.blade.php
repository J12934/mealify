@extends('layouts.app')

@section('content')
    <article class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>All Ingredients, sorted by Date</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Count by</th>
                        <th>Unit</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-info">
                            {{ Form::open( ['route' => ['ingredient.create'], 'method' => 'post', 'class' => 'row']) }}
                            <th scope="row">Create</th>
                            <td>{!! Form::text('name', null, [ 'class' => 'form-control' ]) !!}</td>
                            <td>{!! Form::text('price', null, [ 'class' => 'form-control' ]) !!}</td>
                            <td>{!! Form::text('count_by', null, [ 'class' => 'form-control' ]) !!}</td>
                            <td>{!! Form::text('unit', null, [ 'class' => 'form-control' ]) !!}</td>
                            <td><button type="submit" class="btn btn-secondary"><span class="icon-article"></span> Create </button></td>
                            {!! Form::close() !!}
                        </tr>
                    @foreach($ingredients as $ingredient)
                        <tr>
                            {{ Form::model( $ingredient, ['route' => ['ingredient.update', $ingredient->id], 'method' => 'patch', 'class' => 'row']) }}
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{!! Form::text('name', null, [ 'class' => 'form-control' ]) !!}</td>
                                <td>{!! Form::text('price', null, [ 'class' => 'form-control' ]) !!}</td>
                                <td>{!! Form::text('count_by', null, [ 'class' => 'form-control' ]) !!}</td>
                                <td>{!! Form::text('unit', null, [ 'class' => 'form-control' ]) !!}</td>
                                <td><button type="submit" class="btn btn-secondary"><span class="icon-article"></span> Update</button></td>
                            {!! Form::close() !!}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-xs-center">
                {{ $ingredients->links() }}
            </div>
        </div>
    </article>
@endsection