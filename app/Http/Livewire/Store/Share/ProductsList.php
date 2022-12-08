<?php

namespace App\Http\Livewire\Store\Share;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsList extends Component
{
    use WithPagination;

    public $filterCatalogs = [];
    public $filterBrands = [];

    public $selectedOptions = [];
    public $selectedBrands;

    public $listeners = [
        'filterSelectedBrands',
        'filterSelectedOptions',
    ];

    public function queryString()
    {
        return [
            'selectedOptions' => ['except' => '', 'as' => 'options'],
            'selectedBrands' => ['except' => '', 'as' => 'brands'],
        ];
    }

    public function filterSelectedBrands($filters)
    {
        $this->selectedBrands = join('|', $filters);
    }

    public function filterSelectedOptions($filters)
    {
        $this->selectedOptions = $filters;
    }

    public function render()
    {
        $this->filterBrands = str($this->selectedBrands)
            ->explode('|')
            ->filter()
            ->toArray();

        $products = Product::query()
            ->filters([
                'catalogs' => $this->filterCatalogs,
                'brands' => $this->filterBrands,
                'options' => $this->selectedOptions,
            ])
            ->select(['products.*'])
            ->paginate()
            ->withQueryString();

        return view('livewire.store.share.products-list', [
            'products' => $products
        ]);
    }
}
