<div class="row">
    <div class="col-xl-8 col-lg-7">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-primary">Products</h5>

            </div>


            <div class="card-body">
                <div class="row">
                    @foreach ($filtersearch as $product)
                        <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                            <div class="card" style="align-items: center; margin-bottom: 10px">
                                <button class="btn btn-sm" @click.prevent="addToCart(product.id)">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">
                                            {{ $product->product_name }} -
                                            {{ $product->selling_price }}$</h5>

                                        @if ($product->product_quantity >= 1)
                                            <td><span class="badge badge-success">Available
                                                    <span
                                                        class="badge badge-light">{{ $product->product_quantity }}</span></span>
                                            </td>
                                        @else
                                            <td><span class="badge badge-danger">Stock
                                                    Out</span></td>
                                        @endif



                                    </div>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
