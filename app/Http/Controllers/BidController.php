<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'bid_amount' => 'required|numeric|min:0.01',
        ]);

        // ✅ 1. Get the product's starting bid
        $product = DB::table('products')->where('id', $request->product_id)->first();

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        // ✅ 2. Check if bid is less than the product's starting bid
        if ($request->bid_amount < $product->starting_bid) {
            return redirect()->back()->with('error', 'Your bid must be at least the starting bid: ' . $product->starting_bid);
        }

        // ✅ 3. Fetch the highest bid for the product
        $highestBid = DB::table('biddings')
            ->where('product_id', $request->product_id)
            ->max('bid_amount');

        // ✅ 4. Check if the new bid is higher than the current highest bid
        if ($highestBid !== null && $request->bid_amount <= $highestBid) {
            return redirect()->back()->with('error', 'Your bid must be higher than the current highest bid: ' . $highestBid);
        }

        // ✅ 5. Store the bid
        DB::table('biddings')->insert([
            'user_id' => Auth::id(), 
            'product_id' => $request->product_id,
            'bid_amount' => $request->bid_amount,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('products.show', ['id' => $request->product_id])->with('success', 'Bid placed successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getExpiredProductsWithHighestBids()
    {
        // Subquery to get the highest bid for each product
        $highestBidsSubquery = DB::table('biddings')
            ->select('product_id', DB::raw('MAX(bid_amount) as highest_bid'))
            ->groupBy('product_id');
    
        // Join the subquery with other tables
        $winners = DB::table('biddings')
            ->join('products', 'biddings.product_id', '=', 'products.id')
            ->join('users', 'biddings.user_id', '=', 'users.id')
            ->joinSub($highestBidsSubquery, 'highest_bids', function ($join) {
                $join->on('biddings.product_id', '=', 'highest_bids.product_id')
                     ->on('biddings.bid_amount', '=', 'highest_bids.highest_bid');
            })
            ->select(
                'products.name as product_name',
                'users.name as user_name',
                'users.email as user_email',
                'highest_bids.highest_bid'
            )
            ->where('products.bid_expiry', '<', DB::raw('CURDATE()')) 
            ->orderBy('products.name')
            ->get(); 
       
        return $winners;
    }

    public function showWinnerList()
    {
        // Get expired products and their highest bids
        $winners = $this->getExpiredProductsWithHighestBids();

        return view('admin.winner_list', compact('winners'));
    }
}
