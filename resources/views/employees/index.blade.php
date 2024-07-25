@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('All Employees') }}
                    <a href="{{ route('employees.create') }}" class="btn btn-primary float-end">Add Employee</a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif  
                    <div class="row">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Employee Name</th>
                                    <th>Contact No</th>
                                    <th>Department Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td>{{ $employee->id }}</td>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->contact_no }}</td>
                                    <td>{{ $employee->department->name }}</td>
                                    <td>
                                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
