<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public static function index () 
    {
        $categories = Category::where('status', 'active')->paginate(25);

        return view('category.index', ['categories' => $categories]);
    }

    public function show(Category $category)
    {
        $products = Product::where('category_id', $category->id)->paginate(10);
        return view('category.show', ['category' => $category, 'products' => $products] );
    }

    /* public function search(Request $request)
    {
        $query = $request->input('q');

        $categories = Category::where([['status', 'active'], ['name', 'like', "%{$query}%"]])
                           ->orderBy('created_at', 'desc')
                           ->paginate(10);

        return view('search', compact('categories', 'query'));
    } */
}
