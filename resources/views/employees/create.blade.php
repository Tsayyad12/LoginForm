@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Add Employee') }}</div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('employees.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Employee Name" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="contact_no">Contact No</label>
                            <input type="text" name="contact_no" class="form-control" placeholder="Enter Contact Number" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="department_id">Select Department</label> 
                            <select name="department_id" class="form-control"> 
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option> 
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Add Employee</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
