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
        @include('partials._available')
        @include('partials._cart')
    </div>
@endsection
