@extends('layouts.app')

@section('content')
    <article class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1>Extraction Report</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <ul class="list-group">
                    @foreach($log as $entry)
                        <li class="list-group-item">{{ $entry }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

    </article>
@endsection
