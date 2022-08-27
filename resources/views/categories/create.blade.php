@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ url('categories') }}" method="post">
    @csrf
@include('categories.form');

</form>
</div>
@endsection
