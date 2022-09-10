@extends('layouts.app')

@section('content')
    <div class="container">
        <table style="width: 100%; border:1">
            <tr>
                <td>Cliente:</td>
                <td>
                    <select name='client_id' id="client_id" v-model='form.client_id' class='form-control'>
                        <option value='0'>Please choose one...</option>
                        @foreach ($clients as $client)
                            <option value='{{ $client->id }}'>{{ $client->Name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <table class="table table-striped" style="width: 100%; border:1">
                        <tr>
                            <td>Producto</td>
                            <td>Precio</td>
                            <td>Cantidad</td>
                            <td>SubTotal</td>
                        </tr>
                        <?php $sumatoria = 0; ?>
                        @foreach ($carts as $carrito)
                            <tr>
                                <td>
                                    {{ $carrito->Name }}
                                </td>
                                <td>
                                    $ {{ $carrito->PriceSell }}
                                </td>
                                <td>
                                    {{ $carrito->Quantity }}
                                </td>
                                <td>
                                    $ {{ number_format($carrito->Quantity * $carrito->PriceSell, 2) }}
                                </td>
                            </tr>
                            <?php $sumatoria = $sumatoria + $carrito->Quantity * $carrito->PriceSell; ?>
                        @endforeach
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>Total:</td>
                            <td>$ {{ number_format($sumatoria, 2) }}</td>
                        </tr>

                    </table>
                </td>
            </tr>
            <input type="hidden" id="montopagar" name="montopagar" value="{{ $sumatoria }}">
            <tr>
                <td>Monto pagado:</td>
                <td><input type="text" name="montopagado" id="montopagado"></td>
            </tr>
            <tr>
                <td> <a class="btn btn-primary" id="boton" onclick="habilitar()">Cerrar Venta</a>
                </td>
            </tr>
        </table>
        <script type="text/javascript">
            function habilitar() {

                var camp1 = document.getElementById('montopagar');
                var camp2 = document.getElementById('montopagado');
                var cliente = document.getElementById('client_id');
                var boton = document.getElementById('boton');

                var precio = false;
                if (camp1.value != camp2.value) {
                    precio = true;
                }
                var habitual = false;
                if (cliente.value != 1) {
                    habitual = true;
                }

                if (cliente.value == 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Cliente No encontrado',
                        text: 'Tiene que seleccionar un cliente!'
                    })

                } else {

                    if (precio && habitual) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Alerta...',
                            text: 'Va a generar una deuda, solo puede seleccionar clientes habituales!'
                        })
                        boton.disabled = true;
                    } else if (camp1.value != camp2.value) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Exito...',
                            text: 'Se va a generar una venta con deuda!'
                        })
                        boton.disabled = false;
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Exito...',
                            text: 'Se va a generar una venta!'
                        })
                    }
                }
            }
        </script>
    </div>
@endsection
