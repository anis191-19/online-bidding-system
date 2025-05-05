<!DOCTYPE html>
<html>
<head>
    <title>Bidding History</title>
    <style>
        /* Add your custom styles here */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>{{ $user->name }}'s Bidding History</h1>

    @if($biddings->isEmpty())
        <p>No bids placed yet.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Bid Amount</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($biddings as $bidding)
                    <tr>
                        <td>{{ $bidding->product->name }}</td>
                        <td>${{ number_format($bidding->bid_amount, 2) }}</td>
                        <td>{{ $bidding->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
