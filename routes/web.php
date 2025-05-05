<?php


use App\Http\Controllers\Admin\AdminDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

route::get('/home',[HomeController ::class,'show']);


Route::get('user/account', [HomeController::class, 'showAccount'])->name('user.account');
Route::get('user/update', [HomeController::class, 'edit'])->name('user.update');
Route::post('user/update', [HomeController::class, 'update'])->name('user.update')->middleware('auth');
Route::post('/products', [ProductController::class,'store'])->name('products.store');
Route::get('user/bids', [HomeController::class, 'showBids'])->name('user.bids')->middleware('auth');
// routes/web.php

Auth::routes();

Route::get('/products', [HomeController::class, 'indexForUser'])->name('products.indexforuser');


Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show')->middleware('auth');
Route::post('/bids', [BidController::class, 'store'])->name('bids.store');

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');



// admin authentication

Route::get('login/admin',[AdminController::class,'adminLoginForm'])->name('admin.login.form');
Route::post('admin-login',[AdminController::class,'adminLogin'])->name('admin.login');

Route::group(['middleware'=>'admin'],function(){
    Route::get('admin/admin_dashboard',[AdminDashboardController::class,'admindDashboard'])->name('admin.admin_dashboard');
    Route::get('admin/logout',[AdminController::class,'adminLogout'])->name('admin.logout');
    // route for categories
    Route::get('categories/admin',[CategoryController::class,'indexforadmin'])->name('admin.categories.index');
    Route::post('category-create',[CategoryController::class,'createCategory'])->name('category.create');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    // Route to update the specific category
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/admin/categories/{id}', [CategoryController::class, 'destroyCategory'])->name('admin.categories.destroy');


// route for products
Route::get('/admin/products', [ProductController::class,'indexforadmin'])->name('products.indexforadmin');
Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class,'store'])->name('products.store');
Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/admin/winner-list', [BidController::class, 'showWinnerList'])->name('winner.list');

// Route to display all users (Admin middleware can be applied if needed)
Route::get('admin/users', [AdminController::class, 'displayUsers'])->name('admin.users');

// Route to remove a user
Route::delete('admin/users/{id}', [AdminController::class, 'removeUser'])->name('admin.users.remove');

});
Route::post('product/bid/store', [BidController::class, 'store'])->name('bid.store');








Route::get('/account/bidding-history/download', [HomeController::class, 'downloadBiddingHistory'])->name('bidding.download');