<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function viewOrders(){
        $user = User::findOrFail(auth()->id());
        $orders = $user->orders()->with('products')->get();
        return view('user.order', compact('orders'));
    }
}
