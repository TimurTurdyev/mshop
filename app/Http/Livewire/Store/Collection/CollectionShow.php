<?php

namespace App\Http\Livewire\Store\Collection;

use App\Http\Livewire\Store\PricesToEntitiesTrait;
use Livewire\Component;

class CollectionShow extends Component
{
    use PricesToEntitiesTrait;

    public function render()
    {
        return view('livewire.store.collection.collection-show');
    }
}
