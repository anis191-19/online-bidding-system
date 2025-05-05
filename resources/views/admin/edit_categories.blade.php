@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Category</div>

                <div class="card-body">
                    <form action="{{ route('categories.update', $data->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="col-form-label">Category Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}" required>
                        </div>

                        <div class="modal-footer">
                            <a href="{{ route('admin.categories.index', $data->id) }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
