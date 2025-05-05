@extends('layouts.app')

@section('content')
<div class="bid-banner p-5">
     
    <div class=" fw-bold fs-1  text-white text-center">Welcome To Our <br>ONLINE BIDDING SYSTEM</div>
    <h1 class=" fw-bold fs-1  text-white text-center">BETTER...FASTER...MORE</h1>
    
    
</div>


    
<div class="container ">
<div class="py-4 ">
    <h1 class="text-center my-3 text-success fw-bold bg-white">Products List For Bidding</h1>
    <div class="d-flex flex-row ">
        <a href="{{ route('home') }}" class="btn btn-primary mb-2">All</a>
        @foreach ($categories as $category)
            <a href="{{ route('home', ['category_id' => $category->id]) }}" class="btn btn-secondary mb-2 mx-2">
                {{ $category->name }}
            </a>
        @endforeach
    </div>
</div>
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-5">
@foreach ($products as $product)
  <div class="col mb-5">
    <div class="card h-75">
    <img src="{{ asset('images/' . $product->image) }}" class="card-img-top h-100" alt="{{ $product->name }}">
      
    </div>
    <div class="my-2">
      <h5 class="card-title fw-bold">{{ $product->name }}</h5>
        <p class="card-text">{{$product->description}}</p>
        <a href="{{ route('products.show', ['id' => $product->id]) }}" class="btn btn-info">Details</a>
      </div>

  </div>
  @endforeach
  
</div>

    
</div>
@endsection
