<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function __invoke(Request $request): View
    {

        // get a cookie username
        $uuid = $request->cookie('uuid');

        // get user
        $user = User::find($uuid);

        // return view with data user
        return view('pages.wishlist.index', [
            "user" => $user,
            'wishlists' => Wishlist::with('product')->with('user')->where('user_id', $uuid)->get(),
        ]);
    }

    public function store(Request $request, string $product_id): RedirectResponse
    {
        Wishlist::create([
            'user_id' => $request->cookie('uuid'),
            'product_id' => $product_id
        ]);

        return back();
    }

    public function delete(Request $request, string $product_id): RedirectResponse
    {
        Wishlist::where('user_id', $request->cookie('uuid'))
            ->where('product_id', $product_id)->delete();

        return redirect()->back()->with('berhasil di hapus dari wishlist');
    }
}
