@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Sidebar for categories -->
        <div class="col-md-3">
            <h3>Categories</h3>
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="{{ route('home') }}">All</a>
                </li>
                @foreach ($categories as $category)
                    <li class="list-group-item">
                        <a href="{{ route('home', ['category_id' => $category->id]) }}">
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Main content area -->
        <div class="col-md-6 p-5">
            <div class="card">
                <div class="h-50 ">
                    <img src="{{ asset('images/' . $product->image) }}" class="card-img-top h-50 w-50" alt="{{ $product->name }}">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p>{{ $product->description }}</p>
                    <p>Starting Bid: ${{ $product->starting_bid }}</p>
                    <p>Highest Bid: ${{ $product->highest_bid ?? 'No bids yet' }}</p>
                    
                    @if ($product->days_left === 'Expired')
                        <p>Winner: {{ $product->highest_bidder_name ?? 'No winner' }}</p>
                    @else
                        <p>Highest Bidder: {{ $product->highest_bidder_name ?? 'No bids yet' }}</p>
                    @endif
                    
                    <p>{{ $product->days_left }}</p>

                    @if ($product->days_left !== 'Expired')
                        <!-- Bid form -->
                        <form action="{{ route('bid.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            
                            <!-- Bid amount input -->
                            <div class="form-group">
                                <label for="bid_amount">Your Bid:</label>
                                <input type="number" name="bid_amount" id="bid_amount" class="form-control" min="0.01" step="0.01" placeholder="Enter your bid" required>
                            </div>
                            
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-success mt-3">Place a Bid</button>
                        </form>
                    @else
                        <p class="text-danger">This auction has expired. No more bids can be placed.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
