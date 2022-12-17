<?php

namespace App\Http\Livewire\Store\Search;

use App\Http\Livewire\Searchable;
use Livewire\Component;

class QueryInput extends Component
{
    use Searchable;

    public function render()
    {
        return view('livewire.store.search.query-input', [
            'items' => $this->search(),
            'placeholder' => '...'
        ]);
    }
}
