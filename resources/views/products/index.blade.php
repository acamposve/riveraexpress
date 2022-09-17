@extends('layouts.app')

@section('content')aaaaaaaaaaaaaaaaaaaaaa
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <!-- Simple Tables -->
                    <div class="card">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h2 class="m-0 font-weight-bold text-primary">Product List</h2>
                            <input type="text" placeholder="Search By Phone" v-model="searchTerm" class="form-control"
                                style="width: 300px;margin-right: -900px;">
                                <a href="{{ url('products/create') }}" class="btn btn-primary float-right"
                                style="margin-top: 6px;margin-right: 6px;">Add Product</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Image</th>
                                        <th>Product Code</th>
                                        <th>Category</th>
                                        <th>Supplier</th>
                                        <th>Root</th>
                                        <th>Buying Price</th>
                                        <th>Selling Price</th>
                                        <th>Product Quantity</th>
                                        <th>Buying Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->product_name }}</td>
                                            <td><img :src="$product->image" id="img_size"></td>
                                            <td>{{ $product->product_code }}</td>
                                            <td>{{ $product->category_name }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->root }}</td>
                                            <td>{{ $product->buying_price }}</td>
                                            <td>{{ $product->selling_price }}</td>
                                            <td>{{ $product->product_quantity }}</td>
                                            <td>{{ $product->buying_date }}</td>
                                            <td>
                                                <router-link :to="{ name: 'editProduct', params: { id: product.id } }"
                                                    class="btn btn-sm btn-primary">Edit</router-link>
                                                <a @click="deleteProduct(product.id)" class="btn btn-sm btn-danger"
                                                    style="color: white">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
