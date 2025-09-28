<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show($id) 
    {
        $orders = Order::with('orderItems.product')->where('user_id', $id)->get();
        return view('order.show', ['orders' => $orders]);
    }
}
