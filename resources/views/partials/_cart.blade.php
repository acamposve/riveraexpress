<div class="col-xl-4 col-lg-5">
    @if (count($products) >= 1)
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-primary">Expense Insert</h5>
                <a href="" class="btn btn-primary btn-sm">Add Customer</a>
            </div>
            <div class="card-body">
                <div class="table-responsive" style="font-size: 12px">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>Qty</th>
                                <th>Unit</th>
                                <th>Total</th>
                                <th>Action</th>
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
                                                    class="fa fa-fw fa-trash"></i> Delete</button>

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
                                <h6 class="my-0">Total Quantity</h6>
                            </div>
                            <span class="text-muted">{{ $cartProduct->sum('product_quantity') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Sub Total</h6>
                            </div>
                            <span class="text-muted">$ {{ $cartProduct->sum('sub_total') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Vat</h6>
                            </div>
                            <span class="text-muted">{{ $vats->vat }}%</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="text-success">
                                <h6 class="my-0">Total (USD)</h6>
                            </div>
                            @php
                                $subtotal = $cartProduct->sum('sub_total');
                                $impuesto = $vats->vat / 100;
                                $total = $subtotal * $impuesto + $subtotal;
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
                        <input type="hidden" name="vat" id="vat" value="{{ $vats->vat }}">

                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Customer</label>
                            <select class="form-control" id="customer_id" name="customer_id">
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Pay</label>
                            <input type="text" class="form-control" v-model="pay" name="pay"
                                onchange="sentDue();" id="pay">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput2">Due</label>
                            <input type="text" class="form-control" name="due" id="due"
                                onfocus="sentDue();">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Pay By</label>
                            <select class="form-control" id="payBy" v-model="payBy">
                                <option value="Cheque">Cheque</option>
                                <option value="Hand Cash">Hand Cash</option>
                                <option value="Gift Card">Gift Card</option>
                            </select>
                        </div>
                        <br>
                        <button class="btn btn-success" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    @else
        I don't have any records!
    @endif
</div>
<script>
    function sentDue() {
        var deuda = document.getElementById("total").value - document.getElementById("pay").value;
        document.getElementById("due").value = (Math.round(deuda * 100) / 100).toFixed(2);

    }
</script>
