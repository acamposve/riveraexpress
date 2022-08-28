@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ url('products') }}" method="post">
        @csrf
        @include('products.form')
        </form>
    </div>
@endsection
