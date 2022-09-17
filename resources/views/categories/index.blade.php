@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <!-- Simple Tables -->
                    <div class="card">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h2 class="m-0 font-weight-bold text-primary">Category List</h2>
                            <input type="text" placeholder="Search By Phone" v-model="searchTerm" class="form-control"
                                style="width: 300px;margin-right: -900px;">
                                <a href="{{ url('categories/create') }}" class="btn btn-success">Agregar Categoria</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)


                                    <tr v-for="category in filtersearch" :key="category.id">
                                        <td>{{ $category->category_name }}</td>
                                        <td>
                                            <router-link :to="{ name: 'editCategory', params: { id: category.id } }"
                                                class="btn btn-sm btn-primary">Edit</router-link>
                                            <a @click="deleteCategory(category.id)" class="btn btn-sm btn-danger"
                                                style="color: white">Delete</a>
                                        </td>
                                    </tr>@endforeach
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
