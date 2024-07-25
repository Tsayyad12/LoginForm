@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Department') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('departments.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Department Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
