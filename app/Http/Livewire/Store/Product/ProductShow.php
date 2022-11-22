<?php

namespace App\Http\Livewire\Store\Product;

use App\Http\Livewire\Store\PricesToEntitiesTrait;
use Livewire\Component;

class ProductShow extends Component
{
    use PricesToEntitiesTrait;

    public function addCart($quantity = 0)
    {
        $this->emit('addCartItem', $this->selectPriceId, $quantity);
    }

    public function render()
    {
        return view('livewire.store.product.product-show');
    }
}
