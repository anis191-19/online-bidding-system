<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
     public function index(Request $request)
     {
         $categories = Category::all(); 
         
         // Fetch products, filter by category if provided
         $products = Product::when($request->category_id, function ($query) use ($request) {
             return $query->where('category_id', $request->category_id);
         })->get();
     
         return view('home', compact('products', 'categories'));
     }
     
     
    public function indexForUser(Request $request)
     {
         $categories = Category::all();
         $products = Product::when($request->category_id, function ($query) use ($request) {
             return $query->where('category_id', $request->category_id);
         })->get();
     
         // Debugging line to check product data
         dd($products);
     
         return view('user.home', compact('products', 'categories'));
     }


     public function showAccount()
{
    $user = auth()->user(); // Get the currently authenticated user

    // Fetch all bids for the authenticated user
    $biddings = $user->biddings()->with('product')->orderBy('created_at', 'desc')->get();

    // Pass both user and biddings data to the view
    return view('user.account', ['user' => $user, 'biddings' => $biddings]);
}
public function edit()
{
    $user = auth()->user(); 
    return view('user.edit', compact('user')); 
}
public function update(Request $request)
{
    $user = auth()->user(); // Get the currently authenticated user

    // Validate the incoming request data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:8|confirmed', // Password is optional, with confirmation
    ]);

    // Update user details
    $user->update([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => $request->filled('password') ? bcrypt($request->input('password')) : $user->password,
    ]);

    return redirect()->route('user.account')->with('success', 'Profile updated successfully');
}

public function showBids()
{
    $user = auth()->user(); // Get the currently authenticated user

    // Fetch all bids for the authenticated user
    $biddings = $user->biddings()->with('product')->orderBy('created_at', 'desc')->get();

    return view('user.bids', ['biddings' => $biddings]);
}

     // Category.php
public function products()
{
    return $this->hasMany(Product::class);
}

// Product.php
public function category()
{
    return $this->belongsTo(Category::class);
}

public function downloadBiddingHistory()
{
    $user = auth()->user(); // Get the authenticated user
    $biddings = $user->biddings()->with('product')->orderBy('created_at', 'desc')->get(); // Fetch bids

    // Load the view with the bidding data
    $pdf = Pdf::loadView('user.bidding_pdf', compact('user', 'biddings'));

    // Download the PDF
    return $pdf->download('bidding_history.pdf');
}

}
