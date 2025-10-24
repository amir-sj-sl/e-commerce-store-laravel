<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public static function index () 
    {
        $products = Product::where('status', 'active')->whereHas('category', fn($q) => $q->where('status', 'active'))->paginate(20);

        return view('product.index', ['products' => $products]);
    }

    public function show(Product $product)
    {
        $category = Category::where('id', $product->category_id)->first();
        if($product->status == 'inactive' || $category->status == 'inactive') {
            abort(404);
        }

        return view('product.show', ['product' => $product]);
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        $products = Product::where([['status', 'active'], ['name', 'like', "%{$query}%"]])
                            ->whereHas('category', fn($q) => $q->where('status', 'active'))
                           ->orderBy('created_at', 'desc')
                           ->paginate(10);

        return view('search', compact('products', 'query'));
    }

    

}