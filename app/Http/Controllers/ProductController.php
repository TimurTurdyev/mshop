<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Group;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product, Request $request): Factory|View|Application
    {
        abort_if(!$product->status, 404);

        $selectPriceId = (int) $request->get('price', 0);

        return view('store.product', [
            'selectPriceId' => $selectPriceId,
            'product' => $product,
        ]);
    }
}
