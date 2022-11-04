<?php

namespace App\Http\Livewire\Collection;

use App\Models\Collection;
use App\Models\Option;
use Livewire\Component;

class CollectionPropertyList extends Component
{
    public Collection $collection;
    public array $options = [];

    public string $title = 'Цены товара';

    protected $listeners
        = [
            'collectionPropertyUpdate' => '$refresh',
        ];

    public function mount()
    {
        $this->options = Option::get(['id', 'group_admin'])->toArray();
    }

    public function add()
    {
        $this->collection->collectionProperties()->create([
            'name' => '',
            'price' => 0,
            'sort_order' => 0,
        ]);

        $this->emitSelf('collectionPropertyUpdate');
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.collection.collection-property-list', [
            'collectionProperties' => $this->collection->collectionProperties,
        ]);
    }
}
