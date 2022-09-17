@extends('layouts.app')

@section('template_title')
    {{ $supplier->name ?? 'Show Supplier' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Supplier</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('suppliers.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $supplier->name }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $supplier->email }}
                        </div>
                        <div class="form-group">
                            <strong>Phone:</strong>
                            {{ $supplier->phone }}
                        </div>
                        <div class="form-group">
                            <strong>Address:</strong>
                            {{ $supplier->address }}
                        </div>
                        <div class="form-group">
                            <strong>Photo:</strong>
                            {{ $supplier->photo }}
                        </div>
                        <div class="form-group">
                            <strong>Shopname:</strong>
                            {{ $supplier->shopName }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
