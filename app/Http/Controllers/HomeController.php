<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show()
    {
        $newArrivals = Product::where('status', 'active')->whereHas('category', fn($q) => $q->where('status', 'active'))->orderBy('created_at', 'desc')->take(10)->get();
        $categories = Category::all();
        $featureds = Product::where('status', 'active')->where('featured', true)->whereHas('category', fn($q) => $q->where('status', 'active'))->orderBy('updated_at', 'desc')->take(10)->get();
        $onSells = Product::where('status', 'active')->where('sell_price', '!=', null)->whereHas('category', fn($q) => $q->where('status', 'active'))->orderBy('updated_at', 'desc')->take(10)->get();

        return view('index', ['newArrivals' => $newArrivals, 'categories' => $categories, 'featureds' => $featureds, 'onSells' => $onSells]);
    }
}
