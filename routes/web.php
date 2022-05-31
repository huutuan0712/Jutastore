<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboadController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Frontend\UserController;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[FrontendController::class,'index']);
Route::get('/category',[FrontendController::class,'category']);
Route::get('/view-category/{slug}',[FrontendController::class,'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}',[FrontendController::class,'productview']);
//Search
Route::get('product-list',[FrontendController::class,'productlist']);
Route::post('searchproduct',[FrontendController::class,'search']);
// Auth
Auth::routes(['verify'=> true]);

// verify email
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('add-to-cart',[CartController::class,'addProduct']);
Route::post('delete-cart',[CartController::class,'deleteProduct']);
Route::post('update-cart',[CartController::class,'updateProduct']);

Route::middleware(['auth'])->group(function(){
   Route::get('cart',[CartController::class,'viewCart']);
   Route::get('checkout',[CheckoutController::class,'index']);

   Route::post('place-order',[CheckoutController::class,'placeorder']);

   Route::get('my-orders',[UserController::class,'index']);
   Route::get('view-order/{id}',[UserController::class,'view']);

   Route::post('proceed-to-payment',[CheckoutController::class,'payment']);

   Route::post('add-rating',[RatingController::class,'add']);
});

Route::get('load-cart-data',[CartController::class,'cartCount']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard','Admin\FontendController@index');
    // Category
    Route::get('categories','Admin\CategoryController@index');
    Route::get('add-category','Admin\CategoryController@create');
    Route::post('insert-category','Admin\CategoryController@insert');
    Route ::get('edit-prod/{id}',[CategoryController::class,'edit']);
    Route::put('update-category/{id}',[CategoryController::class,'update']);
    Route ::get('delete-category/{id}',[CategoryController::class,'destroy']);
    //Product
    Route::get('products','Admin\ProductController@index');
    Route::get('add-product','Admin\ProductController@create');
    Route::post('insert-product','Admin\ProductController@insert');
    Route ::get('edit-product/{id}',[ProductController::class,'edit']);
    Route::put('update-product/{id}',[ProductController::class,'update']);
    Route ::get('delete-product/{id}',[ProductController::class,'destroy']);
    
    Route::get('orders',[OrderController::class,'index']);
    Route::get('admin/view-orders/{id}',[OrderController::class,'view']);
    Route::put('update-order/{id}',[OrderController::class,'updateOrder']);
    Route::get('order-history',[OrderController::class,'Orderhistory']);

    Route::get('users',[DashboadController::class,'users']);
    Route::get('view-users/{id}',[DashboadController::class,'viewUsers']);
});