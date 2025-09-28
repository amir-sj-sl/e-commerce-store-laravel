<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderPlaced;



class CheckoutController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $cart = Cart::with('items.product')->where('user_id', $user->id)->first();

        /* $outOfStock = [];
        foreach($cart->items as $item) {
            if ($item->product->stock < $item->quantity) {
                array_push($outOfStock, $item->product->name);
            }
        }

        if (!empty($outOfStock)) {
            return redirect()->back()->with('error', 'this Products are out of stock: ' . implode(', ', $outOfStock));
        } */

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        return view('checkout', [
            'cart' => $cart,
            'address' => $user->address
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $cart = Cart::with('items.product')->where('user_id', $user->id)->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        $totalPrice = $cart->items->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $outOfStock = [];
        foreach($cart->items as $item) {
            if ($item->product->stock < $item->quantity) {
                array_push($outOfStock, $item->product->name);
            }
        }

        if (!empty($outOfStock)) {
            return redirect()->back()->with('error', 'this Products are out of stock: ' . implode(', ', $outOfStock));
        }

        $order = Order::create([
            'user_id' => $user->id,
            'total_price' => $totalPrice,
            'address' => $request->input('address'),
            'status' => 'pending',
        ]);

        foreach ($cart->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product->id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }

        // MAIL
        /* Mail::to($order->user)->send(
            new OrderPlaced($order)
        ); */


        $cart->items()->delete();

        return redirect()->route('cart')->with('success', 'Order placed successfully!');
    }
}
