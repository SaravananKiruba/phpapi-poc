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

    public function getLatest100Records(Request $request)
    {
        try {
            $perPage = 25;

            $query = Order::query();

            // Filtering
            $columns = ['OrderNumber', 'OrderDate', 'EntryUser', 'CSE', 'Owner', 'ClientName'];
            $filter = $request->input('filter');

            if ($filter) {
                $query->where(function ($q) use ($filter, $columns) {
                    foreach ($columns as $column) {
                        $q->orWhere($column, 'like', "%$filter%");
                    }
                });
            }

            // Sorting
            $sortBy = $request->input('sort_by', 'OrderNumber');
            $sortDirection = $request->input('sort_direction', 'desc');
            if (in_array($sortBy, $columns)) {
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
