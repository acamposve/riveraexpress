@extends('layouts.app')

@section('template_title')
    {{ $order->name ?? 'Show Order' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Order</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('orders.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Customer Id:</strong>
                            {{ $order->customer_id }}
                        </div>
                        <div class="form-group">
                            <strong>Qty:</strong>
                            {{ $order->qty }}
                        </div>
                        <div class="form-group">
                            <strong>Sub Total:</strong>
                            {{ $order->sub_total }}
                        </div>
                        <div class="form-group">
                            <strong>Vat:</strong>
                            {{ $order->vat }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $order->total }}
                        </div>
                        <div class="form-group">
                            <strong>Pay:</strong>
                            {{ $order->pay }}
                        </div>
                        <div class="form-group">
                            <strong>Due:</strong>
                            {{ $order->due }}
                        </div>
                        <div class="form-group">
                            <strong>Payby:</strong>
                            {{ $order->payBy }}
                        </div>
                        <div class="form-group">
                            <strong>Order Date:</strong>
                            {{ $order->order_date }}
                        </div>
                        <div class="form-group">
                            <strong>Order Month:</strong>
                            {{ $order->order_month }}
                        </div>
                        <div class="form-group">
                            <strong>Order Year:</strong>
                            {{ $order->order_year }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
