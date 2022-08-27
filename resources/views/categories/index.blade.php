@extends('layouts.app')

@section('content')
<div class="container">
<a href="{{ url('categories/create') }}" class="btn btn-success">Agregar Categoria</a>

@if(Session::has('mensaje'))
    {{ Session::get('mensaje') }}
@endif
<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach( $categories as $category)
            <tr>
                <td scope="row">{{ $category->id}}</td>
                <td scope="row">{{ $category->Name}}</td>
                <td scope="row">{{ $category->Description}}</td>
                <td scope="row">
                <a href="{{ url('/categories/'.$category->id).'/edit' }}" class="btn btn-warning">Editar</a>
                 -
                   <form action="{{ url('/categories/'.$category->id) }}" method="post" class="d-inline">
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
