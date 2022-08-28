@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('../assets/img/illustrations/illustration-signup.jpg'); background-size: cover;">
            </div>
        </div>
        <div>
            <div class="card card-plain">
                <div class="card-header">
                  <h4 class="font-weight-bolder">Editar Producto</h4>
                  <p class="mb-0">Las categorias son la manera de agrupar los productos</p>
                </div>
                <div class="card-body">
                    <form action="{{ url('/products/'.$product->id) }}" method="post">
                        @csrf
                        {{ method_field('PATCH') }}
                        @include('products.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
