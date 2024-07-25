@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Department') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('departments.update', $department->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Department Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $department->name }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
