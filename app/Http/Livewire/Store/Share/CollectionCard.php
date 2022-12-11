<?php

namespace App\Http\Livewire\Store\Share;

use App\Http\Livewire\Store\PricesToEntitiesTrait;
use Livewire\Component;

class CollectionCard extends Component
{
    use PricesToEntitiesTrait;

    public function queryString()
    {
        return [];
    }

    public function render()
    {
        return view('livewire.store.share.collection-card');
    }
}
