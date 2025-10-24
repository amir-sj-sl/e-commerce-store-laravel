<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public static function index () 
    {
        $products = Product::paginate(25);

        return view('admin.products.index', ['products' => $products]);
    }

    public static function show ($id) 
    {
        $product = Product::find($id);
        return view('admin.products.show', ['product' => $product]);
    }

    public static function add (/* $request = null */) 
    {
        /* dd($request->all);
        if ($category_id != null) {
            $category = Category::findOrFail($id);
            return view('admin.products.add', ['category' => $category]);
        } */
        $categories = Category::all();
        return view('admin.products.add', ['categories' => $categories]);
    }

    public static function addToCategory ($id) 
    {

        // dd($id);
        /* dd($request->all);
        if ($category_id != null) {
            $category = Category::findOrFail($id);
            return view('admin.products.add', ['category' => $category]);
        } */
        $categories = Category::all();
        $category = Category::find($id);
        return view('admin.products.add', ['categories' => $categories, 'category' => $category]);
    }

    public static function store (Request $request) 
    {
        $valiated = $request->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'required',
            'price' => 'required',
            'sell_price' => 'nullable',
            'featured' => 'required|boolean',
            'stock' => 'required',
            'image' => 'required',
            'status' => 'required',
            'category_id' => 'required',
        ]);

        $product = Product::create($valiated);

        return redirect()->route('admin.product.show', $product->id)->with('status', 'Product added');
    }

    public static function edit ($id) 
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', ['product' => $product, 'categories' => $categories]);
    }

    public static function update (Request $request, $id) 
    {
        $valiated = $request->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'required',
            'price' => 'required',
            'sell_price' => 'nullable',
            'featured' => 'required|boolean',
            'stock' => 'required',
            'image' => 'required',
            'status' => 'required',
            'category_id' => 'required',
        ]);

        $product = Product::findOrFail($id);
        $product->update($valiated);

        return redirect()->route('admin.product.show', $product->id)->with('status', 'Product updated');
    }

    public static function destroy ($id) 
    {
        Product::find($id)->delete();
        //$products = Product::all();
        //return redirect()->route('admin.products', ['products' => $products]);
        return redirect()->route('admin.products')->with('status', 'Product Deleted');
    }

    public function active ($id)
    {
        $product = Product::find($id);
        $newStatus = $product->status == 'active' ? 'inactive' : 'active';
        $product->update(['status' => $newStatus]);
    
        return redirect()->route('admin.product.show', $product->id)->with('status', 'Product status updated');
    }
}
