<div class="col-md-12">
    @if (count($products) >= 1)
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-primary">Venta en proceso</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive" style="font-size: 12px">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario</th>
                                <th>Total</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($products as $cartProduct)
                                <tr>
                                    <td>{{ $cartProduct->product_name }}</td>
                                    <td>
                                        <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">

                                            <input type="text" readonly class="form-control"
                                                value="{{ $cartProduct->product_quantity }}" style="width: 28px;">

                                        </div>
                                    </td>
                                    <td>{{ $cartProduct->product_price }}</td>
                                    <td>{{ $cartProduct->sub_total }} $</td>
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
            <div class="card-footer">
                <div class="order-md-2 mb-4">
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Cantidad Total</h6>
                            </div>
                            <span class="text-muted">{{ $cartProduct->sum('product_quantity') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Sub Total</h6>
                            </div>
                            <span class="text-muted">$ {{ $cartProduct->sum('sub_total') }}</span>
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
                        <input type="hidden" name="total" id="total" value="{{ $total }}">
                        <input type="hidden" name="qty" id="qty"
                            value="{{ $cartProduct->sum('product_quantity') }}">
                        <input type="hidden" name="sub_total" id="sub_total"
                            value="{{ $cartProduct->sum('sub_total') }}">


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
                                <option value="Card">Tarjeta</option>
                                <option value="Cash">Efectivo</option>

                            </select>
                        </div><br><br>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card" style="width: 18rem;">

                                    <div class="card-body">
                                        <h5 class="card-title">Entrada Billetes</h5>
                                        <div class="row">
                                            <div class="col-md-6">20$</div>
                                            <div class="col-md-6"><input type="text" id="20" name="20"
                                                    class="form-control"></div>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-6">50$</div>
                                            <div class="col-md-6"><input type="text" id="50" name="50"
                                                    class="form-control"></div>

                                        </div>
                                        <div class="row">

                                            <div class="col-md-6">100$</div>
                                            <div class="col-md-6"><input type="text" id="100" name="100"
                                                    class="form-control"></div>

                                        </div>
                                        <div class="row">

                                            <div class="col-md-6">200$</div>
                                            <div class="col-md-6"><input type="text" id="200"
                                                    name="200" class="form-control"></div>

                                        </div>
                                        <div class="row">

                                            <div class="col-md-6">500$</div>
                                            <div class="col-md-6"><input type="text" id="500"
                                                    name="500" class="form-control"></div>

                                        </div>
                                        <div class="row">

                                            <div class="col-md-6">1000$</div>
                                            <div class="col-md-6"><input type="text" id="1000"
                                                    name="1000" class="form-control"></div>

                                        </div>
                                        <div class="row">

                                            <div class="col-md-6">2000$</div>
                                            <div class="col-md-6"><input type="text" id="2000"
                                                    name="2000" class="form-control"></div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card" style="width: 18rem;">

                                    <div class="card-body">
                                        <h5 class="card-title">Salida Billetes</h5>
                                        <div class="row">
                                            <div class="col-md-6">20$</div>
                                            <div class="col-md-6"><input type="text" id="s20"
                                                    name="s20" class="form-control"></div>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-6">50$</div>
                                            <div class="col-md-6"><input type="text" id="s50"
                                                    name="s50" class="form-control"></div>

                                        </div>
                                        <div class="row">

                                            <div class="col-md-6">100$</div>
                                            <div class="col-md-6"><input type="text" id="s100"
                                                    name="s100" class="form-control"></div>

                                        </div>
                                        <div class="row">

                                            <div class="col-md-6">200$</div>
                                            <div class="col-md-6"><input type="text" id="s200"
                                                    name="s200" class="form-control"></div>

                                        </div>
                                        <div class="row">

                                            <div class="col-md-6">500$</div>
                                            <div class="col-md-6"><input type="text" id="s500"
                                                    name="s500" class="form-control"></div>

                                        </div>
                                        <div class="row">

                                            <div class="col-md-6">1000$</div>
                                            <div class="col-md-6"><input type="text" id="s1000"
                                                    name="s1000" class="form-control"></div>

                                        </div>
                                        <div class="row">

                                            <div class="col-md-6">2000$</div>
                                            <div class="col-md-6"><input type="text" id="s2000"
                                                    name="s2000" class="form-control"></div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card" style="width: 18rem;">

                                    <div class="card-body">
                                        <h5 class="card-title">Entrada Monedas</h5>
                                        <div class="row">
                                            <div class="col-md-6">1$</div>
                                            <div class="col-md-6"><input type="text" id="20"
                                                    name="20" class="form-control"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">2$</div>
                                            <div class="col-md-6"><input type="text" id="50"
                                                    name="50" class="form-control"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">5$</div>
                                            <div class="col-md-6"><input type="text" id="50"
                                                    name="50" class="form-control"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">10$</div>
                                            <div class="col-md-6"><input type="text" id="50"
                                                    name="50" class="form-control"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">50$</div>
                                            <div class="col-md-6"><input type="text" id="50"
                                                    name="50" class="form-control"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card" style="width: 18rem;">

                                    <div class="card-body">
                                        <h5 class="card-title">Salida Monedas</h5>
                                        <div class="row">
                                            <div class="col-md-6">1$</div>
                                            <div class="col-md-6"><input type="text" id="20"
                                                    name="20" class="form-control"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">2$</div>
                                            <div class="col-md-6"><input type="text" id="50"
                                                    name="50" class="form-control"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">5$</div>
                                            <div class="col-md-6"><input type="text" id="50"
                                                    name="50" class="form-control"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">10$</div>
                                            <div class="col-md-6"><input type="text" id="50"
                                                    name="50" class="form-control"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">50$</div>
                                            <div class="col-md-6"><input type="text" id="50"
                                                    name="50" class="form-control"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card" style="width: 18rem;">

                                    <div class="card-body">
                                        <h5 class="card-title">Ticket Pos</h5>
                                        <div class="row">
                                            <div class="col-md-6">Numero de Ticket</div>
                                            <div class="col-md-6"><input type="text" id="20"
                                                    name="20" class="form-control"></div>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-6">Numero de Factura</div>
                                            <div class="col-md-6"><input type="text" id="50"
                                                    name="50" class="form-control"></div>

                                        </div>

                                    </div>
                                </div>
                            </div>




                        </div>

                        <br>
                        <button class="btn btn-success" type="submit">Realizar Venta</button>
                    </form>
                </div>
            </div>
        </div>
    @else
        Seleccione algun producto!
    @endif
</div>
<script>
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
