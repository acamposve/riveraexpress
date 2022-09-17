<div class="col-xl-4 col-lg-5">
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
                            <tr v-for="product in cartProduct" :key="product.id">
                                <td>{{ $cartProduct->product_name }}</td>
                                <td>
                                    <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                        <span class="input-group-btn input-group-prepend">
                                            @if ($cartProduct->product_quantity >= 2)
                                                <button @click.prevent="decrement(product.id)"
                                                    class="btn btn-primary btn-sm bootstrap-touchspin-down"
                                                    type="button">-</button>
                                            @else
                                                <button @click.prevent="decrement(product.id)"
                                                    class="btn btn-primary btn-sm bootstrap-touchspin-down"
                                                    type="button" disabled="">-</button>
                                            @endif
                                        </span>
                                        <input type="text" readonly class="form-control"
                                            value="{{ $cartProduct->product_quantity }}" style="width: 28px;">
                                        <span class="input-group-btn input-group-append">
                                            <button @click.prevent="increment(product.id)"
                                                class="btn btn-primary btn-sm bootstrap-touchspin-up"
                                                type="button">+</button>
                                        </span>
                                    </div>
                                </td>
                                <td>{{ $cartProduct->product_price }}</td>
                                <td>{{ $cartProduct->sub_total }}$</td>
                                <td><a @click="deleteItem(product.id)" class="btn btn-sm btn-danger"
                                        style="color: white;">X</a></td>
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

                <form @submit.prevent="orderDone">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Customer</label>
                        <select class="form-control" id="exampleFormControlSelect1" v-model="customer_id">
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Pay</label>
                        <input type="text" class="form-control" v-model="pay" id="exampleFormControlInput1">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Due</label>
                        <input type="text" class="form-control" v-model="due" id="exampleFormControlInput2">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Pay By</label>
                        <select class="form-control" id="exampleFormControlSelect2" v-model="payBy">
                            <option value="Cheque">Cheque</option>
                            <option value="Hand Cash">Hand Cash</option>
                            <option value="Gift Card">Gift Card</option>
                        </select>
                    </div>
                    <button class="btn btn-success" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
