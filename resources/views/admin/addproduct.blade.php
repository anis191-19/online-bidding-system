@extends('layouts.admin')
@section('content')

<div class="container mt-5">
<h1>Add Product</h1>

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
        <label for="start_price">Start Price:</label>
        <input type="number" id="start_price" name="start_price" class="form-control" required>
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

    <button type="submit" class="btn btn-primary">Add Product</button>
</form>

</div>
 

    
  </main>


  @endsection

    


