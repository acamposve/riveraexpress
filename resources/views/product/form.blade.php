<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">

                    {{ Form::label('Producto') }}
                    {{ Form::text('product_name', $product->product_name, ['class' => 'form-control' . ($errors->has('product_name') ? ' is-invalid' : ''), 'placeholder' => 'Product Name']) }}
                    {!! $errors->first('product_name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Precio de Venta') }}
                    {{ Form::text('selling_price', $product->selling_price, ['class' => 'form-control' . ($errors->has('selling_price') ? ' is-invalid' : ''), 'placeholder' => 'Selling Price']) }}
                    {!! $errors->first('selling_price', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Precio de Compra') }}
                    {{ Form::text('buying_price', $product->buying_price, ['class' => 'form-control' . ($errors->has('buying_price') ? ' is-invalid' : ''), 'placeholder' => 'Buying Price']) }}
                    {!! $errors->first('buying_price', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Categoria') }}
                    <select class="form-control" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('category_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Proveedor') }}
                    <select class="form-control" name="supplier_id">
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endforeach
                    </select>{!! $errors->first('supplier_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Codigo de Producto') }}
                    {{ Form::text('product_code', $product->product_code, ['class' => 'form-control' . ($errors->has('product_code') ? ' is-invalid' : ''), 'placeholder' => 'Product Code']) }}
                    {!! $errors->first('product_code', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6">
                <div class="form-group">

                    {{ Form::label('Fecha de Compra') }}
                    {{ Form::text('buying_date', $product->buying_date, ['class' => 'date form-control' . ($errors->has('buying_date') ? ' is-invalid' : ''), 'placeholder' => 'YYYY-MM-DD']) }}
                    {!! $errors->first('buying_date', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Cantidad') }}
                    {{ Form::text('product_quantity', $product->product_quantity, ['class' => 'form-control' . ($errors->has('product_quantity') ? ' is-invalid' : ''), 'placeholder' => 'Product Quantity']) }}
                    {!! $errors->first('product_quantity', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

    </div><br>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary" onClick="javascript: p=true;">Submit</button>
    </div>
</div>
