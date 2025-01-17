<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Storage;

class OrderDetailController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'nullable|string|max:255',
            'qty' => 'nullable|integer',
            'size_name' => 'nullable|string|max:255',
            'size' => 'nullable|string|max:255',
            'price' => 'nullable|numeric',
            'user_id' => 'nullable|integer',
            
            'brand' => 'nullable|string|max:255',
            'banner_image' => 'nullable|file|mimes:jpeg,png,jpg',
            'color_image' => 'nullable|file|mimes:jpeg,png,jpg',
            'order_id' => 'nullable|string|max:255',
            'status' => 'nullable|integer',
            'cash' => 'nullable|string|max:255',
            'credit' => 'nullable|string|max:255',
            'received' => 'nullable|string|max:255',
            'pending' => 'nullable|string|max:255',
        ]);
    
        if ($request->hasFile('banner_image')) {
            $validatedData['banner_image'] = $request->file('banner_image')->store('order', 'public');
        }
    
        if ($request->hasFile('color_image')) {
            $validatedData['color_image'] = $request->file('color_image')->store('order', 'public');
        }
    
        $orderDetail = OrderDetail::create($validatedData);
    
        return response()->json([
            'success' => true,
            'message' => 'Order detail created successfully.',
            'data' => $orderDetail,
        ], 201);
    }
    public function getAll()
    {
        $orderDetails = OrderDetail::all();

        return response()->json([
            'success' => true,
            'message' => 'Order details retrieved successfully.',
            'data' => $orderDetails,
        ], 200);
    }

    public function getById($id)
    {
        // Find the order detail by ID
        $orderDetail = OrderDetail::find($id);
    
        // Check if the record exists
        if (!$orderDetail) {
            return response()->json([
                'success' => false,
                'message' => 'Order detail not found.',
            ], 404);
        }
    
        // Return the order detail if found
        return response()->json([
            'success' => true,
            'message' => 'Order detail retrieved successfully.',
            'data' => $orderDetail,
        ], 200);
    }
    
    public function getByUserId($userId)
{
    // Retrieve all order details based on the user_id
    $orderDetails = OrderDetail::where('user_id', $userId)->get();

    // Check if the orders exist for the given user_id
    if ($orderDetails->isEmpty()) {
        return response()->json([
            'success' => false,
            'message' => 'No order details found for this user.',
        ], 404);
    }

    // Return the order details for the specified user_id
    return response()->json([
        'success' => true,
        'message' => 'Order details retrieved successfully.',
        'data' => $orderDetails,
    ], 200);
}



    public function update(Request $request, $id)
    {
        // Find the order detail by its ID
        $orderDetail = OrderDetail::find($id);
    
        if (!$orderDetail) {
            return response()->json([
                'success' => false,
                'message' => 'Order detail not found.',
            ], 404);
        }
    
        // Validate the request data
        $validatedData = $request->validate([
            'product_name' => 'nullable|string|max:255',
            'qty' => 'nullable|integer',
            'size_name' => 'nullable|string|max:255',
            'size' => 'nullable|string|max:255',
            'price' => 'nullable|numeric',
            'user_id' => 'nullable|integer',
            'brand' => 'nullable|string|max:255',
            'banner_image' => 'nullable|file|mimes:jpeg,png,jpg',
            'color_image' => 'nullable|file|mimes:jpeg,png,jpg',
            'order_id' => 'nullable|string|max:255',
            'status' => 'nullable|integer',
            'cash' => 'nullable|string|max:255',
            'credit' => 'nullable|string|max:255',
            'received' => 'nullable|string|max:255',
            'pending' => 'nullable|string|max:255',
        ]);
    
        // Check if a new banner image is uploaded and store it
        if ($request->hasFile('banner_image')) {
            $validatedData['banner_image'] = $request->file('banner_image')->store('order', 'public');
        }
    
        // Check if a new color image is uploaded and store it
        if ($request->hasFile('color_image')) {
            $validatedData['color_image'] = $request->file('color_image')->store('order', 'public');
        }
    
        // Update the order detail with the validated data
        $orderDetail->update($validatedData);
    
        // Return a success response with the updated order detail
        return response()->json([
            'success' => true,
            'message' => 'Order detail updated successfully.',
            'data' => $orderDetail,
        ], 200);
    }
    

}
