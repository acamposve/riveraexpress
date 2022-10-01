@extends('layouts.app')

@section('template_title')
    {{ $coin->name ?? 'Show Coin' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Coin</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('coins.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $coin->name }}
                        </div>
                        <div class="form-group">
                            <strong>Quantity:</strong>
                            {{ $coin->quantity }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
