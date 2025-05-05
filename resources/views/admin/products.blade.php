@extends('layouts.admin')

@section('content')

<h1 class="text-center">Products</h1>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Product</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Starting Bid</th>
                                
                                <th>Bid Expiry</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td><img src="{{ asset('images/' . $product->image) }}" width="50" height="50"></td>
                                <td>{{ Str::limit($product->description, 50) }}</td>
                                <td>{{ $product->category_name }}</td> <!-- This will now work -->
                                <td>{{ $product->starting_bid }}</td>
                                <td>{{ $product->bid_expiry }}</td>
                                <td>
                                        <!-- Update Button -->
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning ">Edit</a>
                                 
                                       
                                </td>
                                <td>
                                     <!-- Delete Form -->
                                     <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm " onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                        </form>
                                </td>
                            
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add New Product</button>
            </div>

            <!-- Success and Error Messages -->
                    <div class="container mt-3">
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

            <!-- Modal for adding new product -->
            <div class="container">
            <div class="modal " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content p-5">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="staticBackdropLabel">Add new Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea id="description" name="description" class="form-control" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="starting_bid">Starting Bid:</label>
                                <input type="number" id="starting_bid" name="starting_bid" class="form-control" required>
                            </div>

                            

                            <div class="form-group">
                                <label for="bid_expiry">Bid Expiry:</label>
                                <input type="date" id="bid_expiry" name="bid_expiry" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="category_id">Category:</label>
                                <select id="category_id" name="category_id" class="form-control" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="image">Image:</label>
                                <input type="file" id="image" name="image" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary my-2">Add Product</button>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
