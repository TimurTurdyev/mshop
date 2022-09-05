<?php

namespace App\Http\Livewire\Product;

use App\Models\Catalog;
use Livewire\Component;

class ProductToCatalog extends Component
{
    public $catalogs = [];
    public $selected_catalogs = [];

    public function mount()
    {
        $this->catalogs = Catalog::get(['id', 'name'])->toArray();
    }

    public function updatedSelectedCatalogs($value)
    {
        $this->emitUp('updateSelectedCatalogs', $this->selected_catalogs);
    }

    public function render()
    {
        return view('livewire.product.product-to-catalog');
    }
}
