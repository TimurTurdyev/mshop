<?php

namespace App\Http\Livewire\Store\Product;

use App\Http\Livewire\ProductEmitAddCartTrait;
use App\Http\Livewire\Store\PricesToEntitiesTrait;
use Livewire\Component;

class ProductShow extends Component
{
    use PricesToEntitiesTrait;
    use ProductEmitAddCartTrait;

    public function render()
    {
        return view('livewire.store.product.product-show');
    }
}
