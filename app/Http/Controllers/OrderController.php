<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Add this import for the Request class
use App\Models\Order;

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

    public function getOrders(Request $request)
    {
        try {
            $perPage = $request->input('perPage', 25);
            $query = Order::query();
    
            // Filtering
            $filterColumns = ['orderNumber', 'orderDate', 'entryUser', 'cse', 'owner', 'clientName'];
            foreach ($filterColumns as $column) {
                $value = $request->input($column);
                if ($value) {
                    $query->where($column, 'like', '%' . $value . '%');
                }
            }
    
            // Sorting
            $sortBy = $request->input('sortColumn', 'orderNumber');
            $sortDirection = $request->input('sortOrder', 'asc');
            $validColumns = ['orderNumber', 'orderDate', 'entryUser', 'cse', 'owner', 'clientName'];
            if (in_array($sortBy, $validColumns)) {
                $query->orderBy($sortBy, $sortDirection);
            }
    
            $orders = $query->paginate($perPage);
    
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
