<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public static function index () 
    {
        $categories = Category::paginate(25);

        return view('admin.categories.index', ['categories' => $categories]);
    }

    public static function show ($id) 
    {
        $category = Category::find($id);
        return view('admin.categories.show', ['category' => $category]);
    }

    public static function add () 
    {
        return view('admin.categories.add');
    }

    public static function store (Request $request) 
    {
        $valiated = $request->validate([
            'name' => 'required|min:3|max:255',
            'slug' => 'nullable',
            'description' => 'required',
            'status' => 'required',
        ]);

        $category = Category::create($valiated);

        return redirect()->route('admin.category.show', $category->id)->with('status', 'Category added');
    }

    public static function edit ($id) 
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', ['category' => $category]);
    }

    public static function update (Request $request, $id) 
    {
        $valiated = $request->validate([
            'name' => 'required|min:3|max:255',
            'slug' => 'nullable',
            'description' => 'required',
            'status' => 'required',
        ]);

        $category = Category::findOrFail($id);
        $category->update($valiated);

        return redirect()->route('admin.category.show', $category->id)->with('status', 'Category updated');
    }

    public static function destroy ($id) 
    {
        Category::find($id)->delete();
        return redirect()->route('admin.categories')->with('status', 'Category Deleted');
    }
}
