@extends('layouts.app')

@section('template_title')
    Productos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Productos') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Agregar') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">

                            <form>
                                <input type="search" class="form-control" placeholder="Nombre del producto" name="search"     value="{{ request('search') }}">
                            <input type="submit">
                            </form>
                            <table class="table table-striped table-hover">

                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Producto</th>
                                        <th>Precio de venta</th>
                                        <th>Categoria</th>
                                        <th>Proveedor</th>
                                        <th>Cantidad</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->selling_price }}</td>
                                            <td>{{ $product->category_name }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->product_quantity }}</td>

                                            <td>
                                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('products.edit', $product->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $products->links() !!}
            </div>
        </div>
    </div>
@endsection
