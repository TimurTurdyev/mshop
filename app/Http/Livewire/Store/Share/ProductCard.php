<?php

namespace App\Http\Livewire\Store\Share;

use App\Http\Livewire\ProductEmitAddCartTrait;
use App\Http\Livewire\Store\PricesToEntitiesTrait;
use Livewire\Component;

class ProductCard extends Component
{
    use PricesToEntitiesTrait;
    use ProductEmitAddCartTrait;

    public function queryString()
    {
        return [];
    }

    public function render()
    {
        return view('livewire.store.share.product-card');
    }
}
