<?php

namespace App\Http\Livewire\Collection;

use App\Models\Catalog;
use Livewire\Component;

class CollectionToCatalog extends Component
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
