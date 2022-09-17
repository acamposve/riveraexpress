<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('customer_id') }}
            {{ Form::text('customer_id', $order->customer_id, ['class' => 'form-control' . ($errors->has('customer_id') ? ' is-invalid' : ''), 'placeholder' => 'Customer Id']) }}
            {!! $errors->first('customer_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('qty') }}
            {{ Form::text('qty', $order->qty, ['class' => 'form-control' . ($errors->has('qty') ? ' is-invalid' : ''), 'placeholder' => 'Qty']) }}
            {!! $errors->first('qty', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sub_total') }}
            {{ Form::text('sub_total', $order->sub_total, ['class' => 'form-control' . ($errors->has('sub_total') ? ' is-invalid' : ''), 'placeholder' => 'Sub Total']) }}
            {!! $errors->first('sub_total', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('vat') }}
            {{ Form::text('vat', $order->vat, ['class' => 'form-control' . ($errors->has('vat') ? ' is-invalid' : ''), 'placeholder' => 'Vat']) }}
            {!! $errors->first('vat', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('total') }}
            {{ Form::text('total', $order->total, ['class' => 'form-control' . ($errors->has('total') ? ' is-invalid' : ''), 'placeholder' => 'Total']) }}
            {!! $errors->first('total', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('pay') }}
            {{ Form::text('pay', $order->pay, ['class' => 'form-control' . ($errors->has('pay') ? ' is-invalid' : ''), 'placeholder' => 'Pay']) }}
            {!! $errors->first('pay', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('due') }}
            {{ Form::text('due', $order->due, ['class' => 'form-control' . ($errors->has('due') ? ' is-invalid' : ''), 'placeholder' => 'Due']) }}
            {!! $errors->first('due', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('payBy') }}
            {{ Form::text('payBy', $order->payBy, ['class' => 'form-control' . ($errors->has('payBy') ? ' is-invalid' : ''), 'placeholder' => 'Payby']) }}
            {!! $errors->first('payBy', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('order_date') }}
            {{ Form::text('order_date', $order->order_date, ['class' => 'form-control' . ($errors->has('order_date') ? ' is-invalid' : ''), 'placeholder' => 'Order Date']) }}
            {!! $errors->first('order_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('order_month') }}
            {{ Form::text('order_month', $order->order_month, ['class' => 'form-control' . ($errors->has('order_month') ? ' is-invalid' : ''), 'placeholder' => 'Order Month']) }}
            {!! $errors->first('order_month', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('order_year') }}
            {{ Form::text('order_year', $order->order_year, ['class' => 'form-control' . ($errors->has('order_year') ? ' is-invalid' : ''), 'placeholder' => 'Order Year']) }}
            {!! $errors->first('order_year', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>