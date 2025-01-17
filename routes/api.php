<?php

use App\Http\Controllers\Api\CategoryController as ApiCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\WishlistController;
use App\Models\OrderDetail;

Route::get('/', function () {
    return response()->json([
        'message' => 'Welcome to the API',
        'status' => 200,
    ]);
});

// Auth Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/users', [AuthController::class, 'getAllUsers']);
Route::post('/logout-all-devices', [AuthController::class, 'logoutAllDevices']);





Route::get('/user/profile', [AuthController::class, 'getUserProfile']);
Route::post('/user/update', [AuthController::class, 'updateUser']);

// Product Routes
Route::post('/products', [ProductController::class, 'productstored']);
Route::post('/products/update/{id}', [ProductController::class, 'updateProduct']);
Route::delete('/products/delete/{id}', [ProductController::class, 'deleteProduct']);
Route::get('/products/list', [ProductController::class, 'getAllProducts']);
Route::get('/products/list/{id}', [ProductController::class, 'getProductById']);


// Banner Routes
Route::post('/banners', [BannerController::class, 'store']);

// Category Routes
Route::post('/categories', [CategoryController::class, 'categorystore']);
Route::get('/categories/list', [CategoryController::class, 'categorylist']);

// Shipping Routes
Route::post('/shipping', [ShippingController::class, 'store']);
Route::put('/shipping/update', [ShippingController::class, 'update']);
Route::get('/shippings/get', [ShippingController::class, 'index']);
Route::delete('/shipping/{user_id}', [ShippingController::class, 'destroy']);

 // Order API

 Route::post('/order-details', [OrderDetailController::class, 'store']);
 Route::get('/order-details/get', [OrderDetailController::class, 'getAll']);
 Route::put('order-details/{id}', [OrderDetailController::class, 'update']);
 Route::get('/order-details/get/{id}', [OrderDetailController::class, 'getById']);
 Route::get('order-details/user/{userId}', [OrderDetailController::class, 'getByUserId']);



 Route::post('/cart-items', [CartItemController::class, 'store']);
 Route::get('/cart-items/get/{user_id}', [CartItemController::class, 'index']);
 Route::delete('/cart-items/{id}', [CartItemController::class, 'destroy']);


 Route::post('super-admin/register', [SuperAdminController::class, 'register']);
 Route::post('super-admin/login', [SuperAdminController::class, 'login']);
 Route::post('super-admin/logout', [SuperAdminController::class, 'logout']);
 Route::get('/super-admins/get', [SuperAdminController::class, 'getAllDetails']);
 Route::post('super-admin/update/{id}', [SuperAdminController::class, 'update']);




 Route::post('/wishlists', [WishlistController::class, 'store']);
 Route::get('/wishlists/get/{user_id}', [WishlistController::class, 'getByUserId']);
 Route::get('/wishlists/get-all', [WishlistController::class, 'getAllWishlists']);
 Route::delete('/wishlists/delete/{product_id}', [WishlistController::class, 'deleteByProductId']);






 
// php artisan serve --host=0.0.0.0
