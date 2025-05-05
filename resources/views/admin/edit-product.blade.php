@extends('layouts.admin')

@section('content')

<h1>Edit Product</h1>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Edit Product</div>

                <div class="card-body">
                    <!-- Display success or error messages -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Form for editing the product -->
                    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea id="description" name="description" class="form-control" required>{{ old('description', $product->description) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="starting_bid">Starting Bid:</label>
                            <input type="number" id="starting_bid" name="starting_bid" class="form-control" value="{{ old('starting_bid', $product->starting_bid) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="bid_expiry">Bid Expiry:</label>
                            <input type="date" id="bid_expiry" name="bid_expiry" class="form-control" value="{{ old('bid_expiry', $product->bid_expiry) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="category_id">Category:</label>
                            <select id="category_id" name="category_id" class="form-control" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" id="image" name="image" class="form-control">
                            @if($product->image)
                                <img src="{{ asset('images/' . $product->image) }}" width="100" height="100" class="mt-2">
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary mt-2">Update Product</button>
                        <a href="{{ route('products.indexforadmin') }}" class="btn btn-secondary mt-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
