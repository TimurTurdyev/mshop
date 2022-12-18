<?php

namespace App\Http\Livewire\Catalog;

use App\Http\Livewire\PageLivewireTrait;
use App\Models\Catalog;
use App\Models\Enums\CatalogEntityShowEnum;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Livewire\Component;

class CatalogCreateOrUpdate extends Component
{
    use PageLivewireTrait;

    public Catalog $catalog;
    public bool $exists = false;
    public array $catalogEntityShow;

    protected function rules(): array
    {
        return [
            'catalog.slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('catalogs', 'slug')->ignore($this->catalog->id),
            ],
            'catalog.name' => 'required|string|max:255',
            'catalog.status' => 'nullable|boolean',
            'catalog.entity_show' => ['required', new Enum(CatalogEntityShowEnum::class)],
        ];
    }

    public function mount(Catalog $catalog)
    {
        $this->catalog = $catalog;
        $this->exists = $this->catalog->exists;
        $this->mountPage($this->catalog);
        $this->catalogEntityShow = array_map(fn($item) => [
            'id' => $item->name,
            'name' => $item->value,
        ], \App\Models\Enums\CatalogEntityShowEnum::cases());
    }

    public function save()
    {
        $this->saveModelAndPage($this->catalog, [
            'status' => 0,
        ]);

        if (!$this->exists) {
            return redirect()->route('admin.catalog.edit', $this->catalog);
        }
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.catalog.catalog-create-or-update');
    }
}
