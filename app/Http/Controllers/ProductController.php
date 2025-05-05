<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */  public function indexForUser(Request $request)
{
    $categories = Category::all();
    $products = Product::when($request->category_id, function ($query) use ($request) {
        return $query->where('category_id', $request->category_id);
    })->get();

    // Debugging line to check product data
    dd($products);

    return view('user.index', compact('products', 'categories'));
}

    public function indexforadmin()
    {
        $categories = DB::table('categories')->get(); 
    
        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category_name')
            ->get(); 
    
        return view('admin.products', compact('categories', 'products')); 
    }
    
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = DB::table('categories')->get(); 
        return view('admin.products', compact('categories'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'starting_bid' => 'required|numeric',
        'bid_expiry' => 'required|date',
        'category_id' => 'required|exists:categories,id',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Handle image upload
    $imageName = time() . '.' . $request->image->extension();
    $request->image->move(public_path('images'), $imageName);

    // Store product data in database
    $product = DB::table('products')->insert([
        'name' => $request->name,
        'description' => $request->description,
        'starting_bid' => $request->starting_bid,
       
        'bid_expiry' => $request->bid_expiry,
        'category_id' => $request->category_id,
        'image' => $imageName,
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    
    if ($product) {
        return redirect()->route('products.indexforadmin')->with('success', 'Product added successfully!');
    } else {
        return redirect()->back()->with('error', 'Error adding product.');
    }
}
// method to edit product
public function edit($id)
{
    $product = DB::table('products')->where('id', $id)->first();
    $categories = DB::table('categories')->get(); 
    return view('admin.edit-product', compact('product', 'categories')); 
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'starting_bid' => 'required|numeric',
        'bid_expiry' => 'required|date',
        'category_id' => 'required|exists:categories,id',
        'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $productData = [
        'name' => $request->name,
        'description' => $request->description,
        'starting_bid' => $request->starting_bid,
        'bid_expiry' => $request->bid_expiry,
        'category_id' => $request->category_id,
        'updated_at' => now(),
    ];

    if ($request->hasFile('image')) {
        // Handle image upload
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $productData['image'] = $imageName;
    }

    // Update product data in database
    $updated = DB::table('products')->where('id', $id)->update($productData);

    if ($updated) {
        return redirect()->route('products.indexforadmin')->with('success', 'Product updated successfully!');
    } else {
        return redirect()->back()->with('error', 'Error updating product.');
    }
}

// mehod for delete

public function destroy($id)
{
    $deleted = DB::table('products')->where('id', $id)->delete();

    if ($deleted) {
        return redirect()->route('products.indexforadmin')->with('success', 'Product deleted successfully!');
    } else {
        return redirect()->back()->with('error', 'Error deleting product.');
    }
}









    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $product = DB::table('products')
        ->leftJoin(DB::raw('(SELECT product_id, MAX(bid_amount) as highest_bid FROM biddings GROUP BY product_id) as max_bids'), 
            'products.id', '=', 'max_bids.product_id')
        ->leftJoin('biddings', function($join) {
            $join->on('biddings.product_id', '=', 'products.id')
                 ->on('biddings.bid_amount', '=', 'max_bids.highest_bid');
        })
        ->leftJoin('users', 'biddings.user_id', '=', 'users.id')
        ->select(
            'products.*', 
            'max_bids.highest_bid',
            'users.name as highest_bidder_name', // Assuming 'name' is the column for the user's name
            DB::raw("
                CASE 
                    WHEN DATEDIFF(products.bid_expiry, CURDATE()) > 0 
                        THEN CONCAT(DATEDIFF(products.bid_expiry, CURDATE()), ' days left')
                    WHEN DATEDIFF(products.bid_expiry, CURDATE()) = 0 
                        THEN CONCAT('Open until ', TIME_FORMAT(products.bid_expiry, '%H:%i'))
                    ELSE 'Expired'
                END as days_left")
        )
        ->where('products.id', $id)
        ->first();
    
    // Fetch categories if needed in this view
    $categories = DB::table('categories')->get();
    
    return view('user.productdetails', compact('product', 'categories'));
}

    

    /**
     * Show the form for editing the specified resource.
     */

    
    /**
     * Remove the specified resource from storage.
     */
   
    public function search(Request $request)
{
    // Validate the search query
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $keyword = $request->input('name');
    $products = DB::table('products')
        ->where('name', 'like', '%' . $keyword . '%')
        ->get();

    $categories = DB::table('categories')->get();

    return view('user\index', ['products' => $products, 'categories' => $categories]);
}
}
