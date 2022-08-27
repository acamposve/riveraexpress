@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ url('/categories/'.$category->id) }}" method="post">
    @csrf
    {{ method_field('PATCH') }}
    @include('categories.form')
</form>
</div>
@endsection
