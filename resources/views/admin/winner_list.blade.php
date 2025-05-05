@extends('layouts.admin')

@section('content')
<div class="container p-4">
    <h2 class="text-center fw-bold">Winner List</h2>
    
  

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>User Name</th>
                <th>User Email</th>
                <th>Bid Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($winners as $winner)
                <tr>
                    <td>{{ $winner->product_name }}</td>
                    <td>{{ $winner->user_name }}</td>
                    <td>{{ $winner->user_email }}</td>
                    <td>${{ number_format($winner->highest_bid, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
