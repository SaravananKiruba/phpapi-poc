<?php

namespace App\Http\Controllers;

use App\Models\Order; // Assuming your model is named Order

class OrderController extends Controller
{
    public function getOrderDetails()
    {
        try {
            $orders = Order::all();

            return response()->json([
                'success' => true,
                'data' => $orders,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
    public function getOrderDetailbyOrderNo($orderNumber)
    {
        try {
            $order = Order::where('OrderNumber', $orderNumber)->first();

            if (!$order) {
                return response()->json([
                    'success' => false,
                    'message' => 'Order not found',
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $order,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
