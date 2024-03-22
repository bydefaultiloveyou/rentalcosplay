<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\User as ToolsUser;
use App\Models\Image;
use App\Models\Product;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Polyfill\Uuid\Uuid;

class ProductController extends Controller
{

    private string $productID;

    public function index(Request $request): View
    {
        $products = Product::where('user_id', $request->cookie('uuid'))->with('image')->get();

        return view('dashboard.products.index', [
            'products' => $products,
            'page' => 'product'
        ]);
    }

    public function create(): View
    {
        return view('dashboard.products.create', [
            'page' => 'create'
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        // get images
        $files = $request->file("images");

        // save a product
        $id = $this->saveProduct($request);

        // save a product id
        $this->productID = Product::where('id', $id)->first()->id;

        // upload images
        foreach ($files as $file) {
            $this->uploadImage($file);
        }

        return redirect()
            ->route('product.dashboard.index')
            ->with('success', 'Product berhasil di tambahkan');
    }

    public function edit(string $id): View
    {
        return view('dashboard.products.edit', ['product' => Product::with('image')->find($id), 'page' => 'product']);
    }

    public function put(Request $request, string $id): RedirectResponse
    {
        Product::where('id', $id)->update($request->except(['_token', '_method']));
        return redirect()->back()->with('succces', 'Item berhasil di update');
    }

    public function delete(string $id)
    {
        $images = Image::where('product_id', $id)->get();
        foreach ($images as $image) {
            if (
                file_exists(public_path('storage/products/') . $image->filename)
                and file_exists(storage_path('app/public/products/') . $image->filename)
            ) {
                unlink(public_path('/storage/products/') . $image->filename);
            }
        }

        Wishlist::where('product_id', $id)->delete();

        Product::where('id', $id)->delete();
        return redirect()->route('product.dashboard.index')->with('success', 'Item berhasil di hapus');
    }

    private function saveProduct(Request $request)
    {
        // get a ID User
        $userId = ToolsUser::ID('id', $request->cookie('uuid'));

        // store a products
        return Product::create(['user_id' => $userId, ...$request->all()])->id;
    }

    private function uploadImage($image): bool
    {
        // valid extension file
        $validExtensions = ['jpg', 'jpeg', 'png'];

        // check extension
        if (in_array(strtolower($image->getClientOriginalExtension()), $validExtensions)) {


            // make a filename
            $filename = Carbon::now() . $image->getClientOriginalName();

            // save on database
            Image::create(['filename' => $filename, 'product_id' => $this->productID]);

            // move file
            $image->move(storage_path('app/public/products'), $filename);

            // return true
            return true;
        }

        return  false;
    }
}
