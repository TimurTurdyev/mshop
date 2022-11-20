<?php

namespace App\Http\Controllers;

use App\Models\Catalog;

class CatalogController extends Controller
{
    public function index()
    {
        return view('store.catalog');
    }

    public function show(Catalog $catalog)
    {
        abort_if(!$catalog->status, 404);

        $entityItems = $catalog->entityItems()->get();

        return view('store.catalog', [
            'catalog' => $catalog,
            'entityItems' => $entityItems
        ]);
    }
}
