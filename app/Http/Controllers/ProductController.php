<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public static function index () 
    {
        $products = Product::where('status', 'active')->paginate(25);

        return view('product.index', ['products' => $products]);
    }

    public function show(Product $product)
    {
        //$product = Product::findOrFail($product);
        return view('product.show', ['product' => $product]);
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        $products = Product::where([['status', 'active'], ['name', 'like', "%{$query}%"]])
                           ->orderBy('created_at', 'desc')
                           ->paginate(10);

        return view('search', compact('products', 'query'));
    }

    

}