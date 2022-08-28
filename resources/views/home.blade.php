@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">weekend</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Today's Money</p>
                            <h4 class="mb-0">$53k</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Today's Users</p>
                            <h4 class="mb-0">2,300</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than last month
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">New Clients</p>
                            <h4 class="mb-0">3,462</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than yesterday</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">weekend</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Sales</p>
                            <h4 class="mb-0">$103,430</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than yesterday
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12 col-md-6 mt-4 mb-4">
                <div class="card z-index-2 ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <h6>Realizar Venta</h6>
                    </div>
                    <div class="card-body">
                        <hr class="dark horizontal">

                        <form action="{{ url('cart') }}" method="POST">
                            <input type="hidden" name="active" id="active" value="1">
                            @csrf
                            <table style="width: 100%">
                                <tr>
                                    <td>
                                        Seleccione Producto
                                    </td>
                                    <td>
                                        <select name='product_id' v-model='form.product_id' class='form-control'
                                            style="background-color: white">
                                            <option value=''>Please choose one...</option>
                                            @foreach ($products as $product)
                                                <option value='{{ $product->id }}'>{{ $product->Name }}</option>
                                            @endforeach
                                        </select>

                                    </td>
                                    <td>
                                        Cantidad:
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="quantity" id="quantity"
                                            style="background-color: white">
                                    </td>
                                    <td>
                                        <input type="submit" value="Agregar Producto" class="btn btn-success">
                                    </td>
                                </tr>
                            </table>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12 col-md-6 mt-4 mb-4">
                <div class="card z-index-2 ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <h6>Venta en proceso</h6>
                    </div>
                    <div class="card-body">
                        <hr class="dark horizontal">

                        <form action="{{ url('cart') }}" method="POST">
                            <input type="hidden" name="active" id="active" value="1">
                            @csrf
                            <table style="width: 100%; border:1">
                                <tr>
                                    <td>Producto</td>
                                    <td>Precio</td>
                                    <td>Cantidad</td>
                                    <td>SubTotal</td>
                                </tr>
                                <?php $sumatoria = 0; ?>
                                @foreach ($cart as $carrito)
                                    <tr>
                                        <td>
                                            {{ $carrito->Name }}
                                        </td>
                                        <td> {{ $carrito->PriceSell }}
                                        </td>
                                        <td>
                                            {{ $carrito->Quantity }}
                                        </td>
                                        <td>
                                            {{ number_format($carrito->Quantity * $carrito->PriceSell, 2) }}
                                        </td>
                                    </tr>
                                    <?php $sumatoria = $sumatoria + $carrito->Quantity * $carrito->PriceSell; ?>
                                @endforeach
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>Total:</td>
                                    <td>{{ number_format($sumatoria, 2) }}</td>
                                </tr>
                                <tr>
                                    <td> <input type="submit" value="Cerrar Venta" class="btn btn-success">
                                    </td>
                                </tr>
                            </table>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <footer class="footer py-4  ">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="copyright text-center text-sm text-muted text-lg-start">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>,
                        made with <i class="fa fa-heart"></i> by
                        <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative
                            Tim</a>
                        for a better web.
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative
                                Tim</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                target="_blank">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                                target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                                target="_blank">License</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    </div>
@endsection
