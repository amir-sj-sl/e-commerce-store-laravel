<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    //

    public function show()
    {
        $user = Auth::user();

        $cart = Cart::with('items.product')->where('user_id', $user->id)->first();
        //dd($cart);

        return view('cart', [
            'cart' => $cart,
            'cartItems' => $cart ? $cart->items : [],
        ]);
    }

    public function add (Request $request) 
    {
        $user = Auth::user();
        $product = Product::findOrFail($request->input('product_id'));
        if ($product->stock < 1) {
            return redirect()->back()->with('error', 'this Product is out of stock');
        }

        $cart = Cart::firstOrCreate(['user_id' => $user->id]);
        $item = $cart->items()->where('product_id', $product->id)->first();

        if ($item) {
            $item->increment('quantity');
        } else {
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }

        return redirect()->route('cart')->with('success', 'Product added to cart!');
    }

    public function remove ($id) 
    {
        $item = CartItem::findOrFail($id);

        if ($item->cart->user_id !== Auth::id()) {
            abort(403);
        }

        $item->delete();
        return back();
    }

    public function update (Request $request, $id) 
    {
        $item = CartItem::findOrFail($id);

        if ($item->cart->user_id !==Auth::id()) {
            Abort(403);
        }

        if ($request->input('quantity') > $item->product->id) {
            return redirect()->back()->with('error', 'this Product is out of stock: ');
        }

        $item->quantity = $request->input('quantity');
        $item->save();

        return back();
    }
}
