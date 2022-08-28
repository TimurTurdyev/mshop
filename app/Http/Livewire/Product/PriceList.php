<?php

namespace App\Http\Livewire\Product;

use App\Models\OptionValue;
use App\Models\Price;
use App\Models\Product;
use Livewire\Component;

class PriceList extends Component
{
    public Product $product;

    public string $title = 'Цены товара';

    protected $listeners = [
        'priceUpdate' => '$refresh',
    ];

    public function add() {
        $this->product->prices()->create([
            'sku' => '',
            'price' => 0,
            'special' => 0,
            'quantity' => 0,
            'sort_order' => 0,
        ]);
        $this->emitSelf('priceUpdate');
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.product.price-list', [
            'prices' => $this->product->prices,
        ]);
    }
}
