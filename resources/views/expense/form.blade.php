<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">

            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('product_id') }}
                    <select class="form-control" name="product_id">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('product_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('selling_price') }}
                    {{ Form::text('selling_price', $expense->selling_price, ['class' => 'form-control' . ($errors->has('selling_price') ? ' is-invalid' : ''), 'placeholder' => 'Selling Price']) }}
                    {!! $errors->first('selling_price', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('buying_price') }}
                    {{ Form::text('buying_price', $expense->buying_price, ['class' => 'form-control' . ($errors->has('buying_price') ? ' is-invalid' : ''), 'placeholder' => 'Buying Price']) }}
                    {!! $errors->first('buying_price', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('details') }}
                    {{ Form::text('details', $expense->details, ['class' => 'form-control' . ($errors->has('details') ? ' is-invalid' : ''), 'placeholder' => 'Details']) }}
                    {!! $errors->first('details', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('product_qty') }}
                    <input type="text" class="form-control" onblur="calculaMonto();" name="product_qty"
                        id="product_qty"> {!! $errors->first('product_qty', '<div class="invalid-feedback">:message</div>') !!}
                </div>

            </div>
        </div>




        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('amount') }}
                    <input type="text" class="form-control" name="amount" id="amount">
                    {!! $errors->first('amount', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

        </div>
    </div>
    <br>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
<script>
    function calculaMonto() {
        alert("entro");
        var cantidad = document.getElementById("product_qty").value;
        var precioCompra = document.getElementById("buying_price").value;
        alert(cantidad);
        alert(precioCompra);

        var monto = cantidad * precioCompra;
        document.getElementById("amount").value = (Math.round(monto * 100) / 100).toFixed(2);
    }
</script>
