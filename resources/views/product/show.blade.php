@extends('layouts.app')

@section('template_title')
    {{ $product->name ?? 'Show Product' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Product</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Product Name:</strong>
                            {{ $product->product_name }}
                        </div>
                        <div class="form-group">
                            <strong>Selling Price:</strong>
                            {{ $product->selling_price }}
                        </div>
                        <div class="form-group">
                            <strong>Buying Price:</strong>
                            {{ $product->buying_price }}
                        </div>
                        <div class="form-group">
                            <strong>Category Id:</strong>
                            {{ $product->category_id }}
                        </div>
                        <div class="form-group">
                            <strong>Supplier Id:</strong>
                            {{ $product->supplier_id }}
                        </div>
                        <div class="form-group">
                            <strong>Product Code:</strong>
                            {{ $product->product_code }}
                        </div>
                        <div class="form-group">
                            <strong>Root:</strong>
                            {{ $product->root }}
                        </div>
                        <div class="form-group">
                            <strong>Buying Date:</strong>
                            {{ $product->buying_date }}
                        </div>
                        <div class="form-group">
                            <strong>Image:</strong>
                            {{ $product->image }}
                        </div>
                        <div class="form-group">
                            <strong>Product Quantity:</strong>
                            {{ $product->product_quantity }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
