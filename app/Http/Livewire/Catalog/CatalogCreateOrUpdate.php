<?php

namespace App\Http\Livewire\Catalog;

use App\Http\Livewire\PageLivewireTrait;
use App\Models\Catalog;
use Livewire\Component;

class CatalogCreateOrUpdate extends Component
{
    use PageLivewireTrait;

    public Catalog $catalog;
    public array $catalogs;
    public bool $exists = false;

    protected array $rules = [
        'catalog.parent_id' => 'nullable|integer',
        'catalog.name' => 'required|string|min:6',
        'catalog.status' => 'nullable|boolean',
    ];

    public function mount(Catalog $catalog)
    {
        $this->catalog = $catalog;
        $this->exists = $this->catalog->exists;
        $this->catalogs = Catalog::where('id', '<>', $this->catalog->id)->get(['id', 'name'])->toArray();
        $this->mountPage($this->catalog);
    }

    public function save()
    {
        $this->saveModelAndPage($this->catalog, [
            'status' => 0,
        ]);

        if ($this->exists == false) {
            return redirect()->route('admin.catalog.edit', $this->catalog);
        }
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.catalog.catalog-create-or-update');
    }
}
