@extends('layouts.app')

@section('template_title')
    {{ $expense->name ?? 'Show Expense' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Expense</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('expenses.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Details:</strong>
                            {{ $expense->details }}
                        </div>
                        <div class="form-group">
                            <strong>Amount:</strong>
                            {{ $expense->amount }}
                        </div>
                        <div class="form-group">
                            <strong>Expense Date:</strong>
                            {{ $expense->expense_date }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
