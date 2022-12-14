@extends('layouts.app')

@section('template_title')
    Order
@endsection

@section('content')
    {{ $orders }}
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Order') }}
                            </span>


                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Cliente</th>
                                        <th>Total</th>
                                        <th>Pagado</th>
                                        <th>Deuda</th>
                                        <th>Metodo de Pago</th>
                                        <th>Numero de Ticket</th>
                                        <th>Fecha</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($orders as $order)
                                        @if ($order->due > 1)
                                            <tr style="background-color: goldenrod">
                                            @else
                                            <tr>
                                        @endif
                                        <td>{{ ++$i }}</td>

                                        <td>{{ $order->name }} ({{ $order->nickname }})</td>
                                        <td>{{ $order->total }}</td>
                                        <td>{{ $order->pay }}</td>
                                        <td>{{ $order->due }}</td>
                                        <td>{{ $order->payBy }}</td>
                                        <td>{{ $order->order_ticket }}</td>
                                        <td>{{ $order->order_date }} {{ $order->order_time }}</td>
                                        <td>
                                            @foreach ($orderdetails as $details)
                                                @if ($order->id == $details->order_id)
                                                <table>
                                                    <tr>
                                                        <td>{{ $details->product_quantity }}</td><td>{{ $details->product_name }}</td>
                                                    </tr>
                                                </table>


                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                                <a class="btn btn-sm btn-primary "
                                                    href="{{ route('orders.show', $order->id) }}"><i
                                                        class="fa fa-fw fa-eye"></i> Show</a>
                                                <a class="btn btn-sm btn-success"
                                                    href="{{ route('orders.edit', $order->id) }}"><i
                                                        class="fa fa-fw fa-edit"></i> Editar</a>
                                                @csrf
                                                @method('DELETE')
                                                {{-- <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fa fa-fw fa-trash"></i> Eliminar</button> --}}
                                            </form>
                                        </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $orders->links() !!}
            </div>
        </div>
    </div>
@endsection
