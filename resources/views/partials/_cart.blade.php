<div class="col-md-12">
    @if (count($products) >= 1)
        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Venta en Proceso</h5>
                    <div class="table-responsive" style="font-size: 12px">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio Unitario</th>
                                    <th>Total $ </th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $cartProduct)
                                    <tr>

                                        <td>{{ $cartProduct->product_name }}</td>
                                        <td>
                                            <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">

                                                <input type="text" onchange="changeQuantity();" id="product_quantity"
                                                    name="product_quantity" class="form-control"
                                                    value="{{ $cartProduct->product_quantity }}" style="width: 28px;">

                                            </div>
                                        </td>
                                        <td>
                                            <input type="text" id="product_price" name="product_price"
                                                class="form-control" value="{{ $cartProduct->product_price }}"
                                                style="width: 75px;">
                                        </td>
                                        <td><input type="text" id="sub_total" name="sub_total" class="form-control"
                                                value="{{ $cartProduct->sub_total }}" style="width: 75px;"></td>
                                        <td>
                                            <form action="{{ route('cart.destroy', $cartProduct->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fa fa-fw fa-trash"></i> Eliminar</button>

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Montos y forma de pago</h5>
                    <div class="order-md-2 mb-4">
                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Cantidad Total</h6>
                                </div>
                                <span id="total_quantity"
                                    class="text-muted">{{ $cartProduct->sum('product_quantity') }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Sub Total</h6>
                                </div>
                                <span id="bigtotal" class="text-muted">$ {{ $cartProduct->sum('sub_total') }}</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between bg-light">
                                <div class="text-success">
                                    <h6 class="my-0">Total (Pesos)</h6>
                                </div>
                                @php
                                    $subtotal = $cartProduct->sum('sub_total');

                                    $total = $subtotal;
                                @endphp

                                <span class="text-success">${{ $total }}</span>
                            </li>
                        </ul>

                        <form action="{{ route('pos.store') }}" method="POST">

                            <input type="hidden" name="order_time" id="order_time"
                                value="{{ now()->format('H:i:s') }}">
                            <input type="hidden" name="total" id="total" value="{{ $total }}">
                            <input type="hidden" name="qty" id="qty"
                                value="{{ $cartProduct->sum('product_quantity') }}">




                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Seleccione Cliente</label>
                                <select class="form-control" id="customer_id" name="customer_id">
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Pagado</label>
                                <input type="text" class="form-control" v-model="pay" name="pay"
                                    onchange="sentDue();" id="pay">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput2">Deuda</label>
                                <input type="text" class="form-control" name="due" id="due"
                                    onfocus="sentDue();">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect2">Forma de Pago</label>
                                <select class="form-control" id="payBy" name="payBy" onchange="activatePayBy();">
                                    <option value="Debito">Tarjeta Debito</option>
                                    <option value="Creadito">Tarjeta Credito</option>

                                    <option value="Cash">Efectivo</option>

                                </select>
                            </div>


                            <br>
                            <button class="btn btn-success" type="submit">Realizar Venta</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    @else
        Seleccione algun producto!
    @endif
</div>
<script>
    function changeQuantity() {

        alert(document.getElementById("product_quantity").value);
        document.getElementById("sub_total").value = document.getElementById("product_quantity").value * document
            .getElementById("product_price").value

        document.getElementById("bigtotal").innerHTML = document.getElementById("product_quantity").value * document
            .getElementById("product_price").value
    }

    function activatePayBy() {
        if (document.getElementById("payBy").value == "Cash") {
            alert('pago en efectivo');
        }
    }

    function sentDue() {
        if (document.getElementById("pay").value > document.getElementById("total").value) {
            var vuelto = document.getElementById("pay").value - document.getElementById("total").value;
            alert('debe dar ' + vuelto + ' de vuelto');
        }

        var deuda = document.getElementById("total").value - document.getElementById("pay").value;
        if (deuda > 0) {
            document.getElementById("due").value = (Math.round(deuda * 100) / 100).toFixed(2);
        } else {
            document.getElementById("due").value = 0;
        }
    }
</script>
<script>
    $(function() {
        // get user timezone
        $('#timezone').val(Intl.DateTimeFormat().resolvedOptions().timeZone)
    })
</script>
