<?php

namespace App\Http\Livewire\Share;

use App\Models\Catalog;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class EntityToCatalog extends Component
{
    public array $catalogs = [];
    public array $selected_catalogs = [];
    public string $entity_show = 'product';

    public function mount()
    {
        $this->catalogs = Catalog::query()
            ->where('entity_show', $this->entity_show)
            ->get(['id', 'name'])
            ->toArray();
    }

    public function updatedSelectedCatalogs($value): void
    {
        $this->emitUp('updateSelectedCatalogs', $this->selected_catalogs);
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.share.entity-to-catalog');
    }
}
