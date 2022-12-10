@extends('layouts.app')

@section('template_title')
    {{ $employee->name ?? 'Show Employee' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Employee</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('employees.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $employee->name }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $employee->email }}
                        </div>
                        <div class="form-group">
                            <strong>Phone:</strong>
                            {{ $employee->phone }}
                        </div>
                        <div class="form-group">
                            <strong>Address:</strong>
                            {{ $employee->address }}
                        </div>
                        <div class="form-group">
                            <strong>Salary:</strong>
                            {{ $employee->salary }}
                        </div>
                        <div class="form-group">
                            <strong>Photo:</strong>
                            {{ $employee->photo }}
                        </div>
                        <div class="form-group">
                            <strong>Nid:</strong>
                            {{ $employee->nid }}
                        </div>
                        <div class="form-group">
                            <strong>Joining Date:</strong>
                            {{ $employee->joining_date }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
