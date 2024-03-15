<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::where('user_id', $request->cookie('uuid'))->with('image')->get();

        return view('dashboard.home.index', [
            'products' => $products,
            'page' => 'dashboard'
        ]);
    }
}
