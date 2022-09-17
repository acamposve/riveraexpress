@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <router-link to="/product" class="btn btn-primary float-right"
                                style="margin-top: 6px;margin-right: 6px;">All Product</router-link>
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Add Product</h1>
                                </div>
                                <form @submit.prevent='storeProduct' enctype="multipart/form-data">
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="exampleInputFirstName"
                                                    placeholder="Enter Product Name" v-model="form.product_name">

                                            </div>
                                            <div class="col-md-6">
                                                <input type="number" class="form-control" id="exampleInputEmail"
                                                    placeholder="Enter Product Code" v-model='form.product_code'>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <label for="exampleFormControlSelect1">Seletct Category</label>
                                                <select class="form-control" id="exampleFormControlSelect1">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->category_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleFormControlSelect2">Seletct Supplier</label>
                                                <select class="form-control" id="exampleFormControlSelect2">
                                                    @foreach ($suppliers as $supplier)
                                                    <option value="{{$supplier->id}}">
                                                        {{ $supplier->name }}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" id="exampleInputPhone"
                                                    placeholder="Enter root" v-model='form.root'>

                                            </div>
                                            <div class="col-md-4">
                                                <input type="number" class="form-control" id="exampleInputSalary"
                                                    placeholder="Enter Buying Price" v-model='form.buying_price'>

                                            </div>
                                            <div class="col-md-4">
                                                <input type="number" class="form-control" id="exampleInputSalary"
                                                    placeholder="Enter Selling Price" v-model='form.selling_price'>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <input type="date" class="form-control" id="exampleInputAddress"
                                                    placeholder="Enter Buying Date" v-model='form.buying_date'>

                                            </div>
                                            <div class="col-md-6">
                                                <input type="number" class="form-control" id="exampleInputNid"
                                                    placeholder="Enter Product Quantity" v-model='form.product_quantity'>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile"
                                                        @change="onFileSelected">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img :src="form.image" style="width: 146px">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                    </div>
                                </form>
                                <div class="text-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
