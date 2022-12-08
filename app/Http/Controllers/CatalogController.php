<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Price;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        return view('store.catalog');
    }

    public function show(Catalog $catalog, Request $request)
    {
        abort_if(!$catalog->status, 404);

        return view('store.catalog-show', [
            'catalog' => $catalog,
        ]);
    }
}
