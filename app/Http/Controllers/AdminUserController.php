<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index () 
    {
        $users = User::paginate(20);

        return view('admin.users.index', ['users' => $users]);
    }

    public function show($id) {
        $user = User::with('orders')->findOrFail($id);

        return view('admin.users.show', ['user' => $user]);
    }
}
