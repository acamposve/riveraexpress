@extends('layouts.app')

@section('content')
<div class="container">
<a href="{{ url('categories/create') }}" class="btn btn-success">Agregar Categoria</a>

@if(Session::has('mensaje'))
    {{ Session::get('mensaje') }}
@endif


<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Categorias</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nombre</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Descripcion</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach( $categories as $category)
                    <tr>
                      <td>
                          {{ $category->id}}
                      </td>
                      <td>
                        {{ $category->Name}}
                      </td>
                      <td class="align-middle text-center text-sm">
                      {{ $category->Description}}
                      </td>
                      <td class="align-middle">
                        <a href="{{ url('/categories/'.$category->id).'/edit' }}" class="btn btn-warning">Editar</a>
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
            </div>
          </div>
        </div>
      </div>
</div>
@endsection
