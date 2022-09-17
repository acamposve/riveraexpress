<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('product_name') }}
                    {{ Form::text('product_name', $product->product_name, ['class' => 'form-control' . ($errors->has('product_name') ? ' is-invalid' : ''), 'placeholder' => 'Product Name']) }}
                    {!! $errors->first('product_name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('selling_price') }}
                    {{ Form::text('selling_price', $product->selling_price, ['class' => 'form-control' . ($errors->has('selling_price') ? ' is-invalid' : ''), 'placeholder' => 'Selling Price']) }}
                    {!! $errors->first('selling_price', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('buying_price') }}
                    {{ Form::text('buying_price', $product->buying_price, ['class' => 'form-control' . ($errors->has('buying_price') ? ' is-invalid' : ''), 'placeholder' => 'Buying Price']) }}
                    {!! $errors->first('buying_price', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('category_id') }}
                    <select class="form-control" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                   {!! $errors->first('category_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('supplier_id') }}
                    <select class="form-control" name="supplier_id">
                        @foreach ($suppliers as $supplier)
                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                        @endforeach
                    </select>{!! $errors->first('supplier_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('product_code') }}
                    {{ Form::text('product_code', $product->product_code, ['class' => 'form-control' . ($errors->has('product_code') ? ' is-invalid' : ''), 'placeholder' => 'Product Code']) }}
                    {!! $errors->first('product_code', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('root') }}
                    {{ Form::text('root', $product->root, ['class' => 'form-control' . ($errors->has('root') ? ' is-invalid' : ''), 'placeholder' => 'Root']) }}
                    {!! $errors->first('root', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('buying_date') }}
                    {{ Form::text('buying_date', $product->buying_date, ['class' => 'form-control' . ($errors->has('buying_date') ? ' is-invalid' : ''), 'placeholder' => 'Buying Date']) }}
                    {!! $errors->first('buying_date', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('image') }}
                    {{ Form::text('image', $product->image, ['class' => 'form-control' . ($errors->has('image') ? ' is-invalid' : ''), 'placeholder' => 'Image']) }}
                    {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('product_quantity') }}
                    {{ Form::text('product_quantity', $product->product_quantity, ['class' => 'form-control' . ($errors->has('product_quantity') ? ' is-invalid' : ''), 'placeholder' => 'Product Quantity']) }}
                    {!! $errors->first('product_quantity', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div><br>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
