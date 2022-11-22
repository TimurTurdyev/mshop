<?php

namespace App\Http\Livewire\Product;

use App\Models\Option;
use App\Models\Product;
use Livewire\Component;

class PriceList extends Component
{
    public Product $product;

    public string $title = 'Цены товара';

    public array $options = [];

    protected $listeners = [
        'priceUpdate' => '$refresh',
    ];

    public function mount()
    {
        $this->options = Option::get(['id', 'group_admin'])->toArray();
    }

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
