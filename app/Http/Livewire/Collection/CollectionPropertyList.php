<?php

namespace App\Http\Livewire\Collection;

use App\Models\Collection;
use App\Models\Option;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CollectionPropertyList extends Component
{
    public Collection $collection;
    public array $options = [];

    public string $title = 'Цены товара';

    protected $listeners = [
        'collectionPropertyUpdate' => '$refresh',
    ];

    public function mount()
    {
        $this->options = Option::get(['id', 'group_admin'])->toArray();
    }

    public function add()
    {
        $this->collection->prices()->create([
            'name' => '',
            'price' => 0,
            'sort_order' => 0,
        ]);

        $this->emitSelf('collectionPropertyUpdate');
    }

    public function render(): View
    {
        return view('livewire.collection.collection-property-list', [
            'prices' => $this->collection->prices,
        ]);
    }
}
