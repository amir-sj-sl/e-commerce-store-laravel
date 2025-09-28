<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
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
        $orderItemsCount = OrderItem::where('order_id', $id)->count();
        $order = Order::with('orderItems.product')->findOrFail($id);
        return view('admin.orders.show', ['order' => $order , 'orderItemsCount' => $orderItemsCount ]);
    }

    public function complete ($id)
    {
        $order = Order::with('orderItems.product')->findOrFail($id);  

        $outOfStock = [];
        foreach($order->orderItems as $orderItem) {
            if ($orderItem->product->stock < $orderItem->quantity) {
                array_push($outOfStock, $orderItem->product->name);
            }
        }

        if (!empty($outOfStock)) {
            return redirect()->back()->with('error', 'this Products are out of stock: ' . implode(', ', $outOfStock));
        } 

        foreach($order->orderItems as $orderItem) {
            $orderItem->product->decrement('stock', $orderItem->quantity);
        };
        $order->update(['status' => 'completed']);

        // dd($items);
        return redirect()->route('admin.order.show', $id)->with('status', 'Order marked as completed')->with('order', $order);
    }
}
