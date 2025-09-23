<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show()
    {
        $products = Product::where('status', 'active')->orderBy('created_at', 'desc')->take(10)->get();
        /* $products = Product::where('status', 'active')->get(); */
        $categories = Category::all();

        return view('index', ['products' => $products, 'categories' => $categories]);
    }
}
