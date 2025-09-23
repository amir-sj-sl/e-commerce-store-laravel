<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function dashboard()
    {
        $totalUsers = \App\Models\User::count();
        $totalOrders = \App\Models\Order::count();
        $totalProducts = \App\Models\Product::count();
        $totalCategories = \App\Models\Category::count();

        return view('admin.dashboard', compact('totalUsers', 'totalOrders', 'totalProducts', 'totalCategories'));
    }
}
