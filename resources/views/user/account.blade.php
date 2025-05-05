@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Account Details</h1>

       <div class="row g-5">
       <div class="col card col-md-3">
            <div class="card-header">Your Account</div>

            <div class="card-body">
                <p><strong>Name:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <!-- Add more user details here as needed -->

                <!-- Optionally, include a form for updating user details -->
                <a href="{{ route('user.update') }}" class="btn btn-primary">Edit Profile</a>
            </div>
        </div>
        <div class="col card col-md-6">
                    <h1>Your Bidding History</h1>

            @if ($biddings->isEmpty())
                <p>You have not placed any bids yet.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Bid Amount</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($biddings as $bidding)
                            <tr>
                                <td>{{ $bidding->product->name }}</td>
                                <td>${{ number_format($bidding->bid_amount, 2) }}</td>
                                <td>{{ $bidding->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            <a href="{{ route('bidding.download') }}" class="btn btn-secondary">Download Bidding History as PDF</a>
        </div>

        

       </div>
    </div>
@endsection
