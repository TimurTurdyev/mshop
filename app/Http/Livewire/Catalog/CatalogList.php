<?php

namespace App\Http\Livewire\Catalog;

use App\Models\Catalog;
use Livewire\Component;
use Livewire\WithPagination;

class CatalogList extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

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
            'catalogs' => Catalog::orderByDesc('id')->paginate(50)
        ])->layoutData([
            'title' => 'Список категорий'
        ]);
    }
}
