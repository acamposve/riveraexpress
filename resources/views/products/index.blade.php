@extends('layouts.app')

@section('content')
<div class="container">
<a href="{{ url('products/create') }}" class="btn btn-success">Agregar Producto</a>

@if(Session::has('mensaje'))
    {{ Session::get('mensaje') }}
@endif
<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio Compra</th>
            <th>Precio Venta</th>
            <th>Categoria</th>
            <th class="text-right">Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach( $products as $product)
            <tr>
                <td scope="row">{{ $product->id}}</td>
                <td scope="row">{{ $product->Name}}</td>
                <td scope="row">{{ $product->Description}}</td>
                <td scope="row">{{ $product->PricePurchase}}</td>
                <td scope="row">{{ $product->PriceSell}}</td>
                <td scope="row">{{ $product->category}}</td>
                <td scope="row">
                <a href="{{ url('/products/'.$product->id).'/edit' }}" class="btn btn-warning">Editar</a>
                 -
                   <form action="{{ url('/products/'.$product->id) }}" method="post" class="d-inline">
                    @csrf
                    {{ method_field('DELETE') }}
<input type="submit" value="Borrar"  class="btn btn-danger" onclick="Deseas borrar el registro?">
                   </form>
                </td>
            </tr>
            @endforeach
        </tbody>
</table>
</div>
@endsection
