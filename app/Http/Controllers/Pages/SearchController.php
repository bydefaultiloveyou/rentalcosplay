<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request): View
    {
        $query = $request->query('query');

        return view('pages.search.index', [
            'query' => $query,
            'products' => $this->getProductByQuery($query)
        ]);
    }

    private function getProductByQuery(string $query)
    {
        return Product::with('image')
            ->with('user')
            ->where(function ($productQuery) use ($query) {
                $productQuery->where('name', 'LIKE', "%$query%")
                    ->orWhere('character', 'LIKE', "%$query%");
            })
            ->orWhereHas('user', function ($userQuery) use ($query) {
                $userQuery->where('domisili', 'LIKE', "%$query%");
            })
            ->get();
    }
}
