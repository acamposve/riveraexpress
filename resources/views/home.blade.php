@extends('layouts.app')

@section('content')
    <div>
        <form id="contactForm1" action="{{ route('cart.store') }}" method="post" role="form" enctype="multipart/form-data">
            @role('vendedor')
                <p>Libre</p>
            @endrole
            @role('admin')
                <p>Admin</p>
            @endrole

            @csrf
            <!-- Form input fields here (do not forget your name attributes). -->
            <table>
                <tr>
                    <td>Escanear producto</td>
                    <td><input type="text" id="searchParam" name="searchParam" class="form-control" autofocus></td>
                </tr>
                <tr>
                    <td>Seleccione producto:</td>
                    <td><select name="product_id" id="product_id" onchange="selectProduct();" class="form-control">
                            <option value="0">Seleccione</option>

                            @foreach ($filtersearch as $product)
                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                            @endforeach
                        </select></td>
                </tr>
            </table>
        </form><br><br>
        @include('partials._cart')
    </div>
    <script type="text/javascript">
        function selectProduct() {

            document.getElementById('contactForm1').submit();

        }
        /* setup before functions */
        var typingTimer; /* timer identifier */
        var doneTypingInterval = 2000; /* time in ms, 5 second for example */
        var $input = $('#searchParam');

        /* on keyup, start the countdown */
        $input.on('keyup', function() {
            clearTimeout(typingTimer);
            typingTimer = setTimeout(doneTyping, doneTypingInterval);
        });

        /* on keydown, clear the countdown */
        $input.on('keydown', function() {
            clearTimeout(typingTimer);
        });

        /* user is "finished typing," do something */
        function doneTyping() {

            document.getElementById('contactForm1').submit();
        }
    </script>
@endsection
