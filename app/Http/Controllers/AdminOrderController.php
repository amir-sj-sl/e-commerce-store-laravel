<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public static function index () 
    {
        $orders = Order::paginate(20);

        return view('admin.orders.index', ['orders' => $orders]);
    }

    public static function show ($id) 
    {
        $order = Order::with('orderItems.product')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }
}
