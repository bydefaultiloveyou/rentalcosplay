<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __invoke(string $id): View
    {
        $this->incrementView($id);
        $product = Product::where('id', $id)->with('image')->with('user')->first();
        return view('pages.product.index', ['product' => $product, 'wishlist' => $this->checkWishlist($id)]);
    }

    public function incrementView(string $id)
    {
        $view = Product::find($id)->views;
        Product::where('id', $id)->update(['views' => $view + 1]);
    }

    private function checkWishlist(string $id)
    {
        return Wishlist::where('user_id', request()->cookie('uuid'))->where('product_id', $id)->first();
    }
}
