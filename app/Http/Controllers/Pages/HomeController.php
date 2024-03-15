<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $products =  Product::with('user')->with('image')->inRandomOrder()->limit(16)->get();
        return view("pages.home.index", ['products' => $products]);
    }
}
