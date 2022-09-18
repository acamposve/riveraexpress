@extends('layouts.app')

@section('content')
    <div>
        <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            @include('partials._todaySales')
            <!-- Earnings (Annual) Card Example -->
            @include('partials._todayIncome')
            <!-- New User Card Example -->
            @include('partials._todayDue')
            <!-- Pending Requests Card Example -->
            @include('partials._expenseAmount')
        </div>
        <form id="contactForm1" action="{{ route('cart.store') }}" method="post" role="form" enctype="multipart/form-data">
            @csrf
            <!-- Form input fields here (do not forget your name attributes). -->
            <table>
                <tr>
                    <td>Nombre de Producto/SKU</td>
                    <td><input type="text" id="searchParam" name="searchParam" class="form-control"></td>
                </tr>
            </table>
        </form>
        @include('partials._cart')
    </div>
    <script type="text/javascript">
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
