<?php

namespace App\Http\Livewire\Catalog;

use App\Models\Catalog;
use Livewire\Component;

class CatalogList extends Component
{
    public string $search = '';

    public function delete(Catalog $catalog)
    {
        $catalog->page()->delete();
        $catalog->delete();
        $this->reset();
    }

    public function render()
    {
        return view('livewire.catalog.catalog-list', [
            'catalogs' => Catalog::with('page')->tree()->get()->toTree()
        ])->layoutData([
            'title' => 'Список категорий'
        ]);
    }
}
