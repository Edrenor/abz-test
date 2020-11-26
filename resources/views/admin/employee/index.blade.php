@extends('admin.admin')

@section('content')
    <h1>Employees</h1>
    <div class="row justify-content-between">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span>Employee list</span>
                    <a href="{{route('employee-add')}}" class="btn btn-lg bg-dark float-right col-2 text-light">Add
                        employee</a>
                </div>
                <div class="card-body">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>
    {{ $dataTable->scripts() }}
@endsection
