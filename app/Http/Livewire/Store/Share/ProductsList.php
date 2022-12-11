<?php

namespace App\Http\Livewire\Store\Share;

use App\Models\Collection;
use App\Models\Option;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsList extends Component
{
    use WithPagination;

    public $type = 'product';
    public $heading = '';

    public $filterCatalogs = [];
    public $filterBrands = [];
    public $filterCollections = [];
    public $filterGroups = [];

    public $selectedOptions = [];
    public $selectedBrands;

    public $listeners = [
        'filterSelectedBrands',
        'filterSelectedOptions',
    ];

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

        if ($this->type === 'product') {
            $table = (new Product())->getTable();
            $model = Product::query();
        } else {
            $table = (new Collection())->getTable();
            $model = Collection::query();
        }

        $products = $model
            ->filters([
                'catalogs' => $this->filterCatalogs,
                'brands' => $this->filterBrands,
                'options' => $this->selectedOptions,
                'groups' => $this->filterGroups,
                'collections' => $this->filterCollections,
            ])
            ->select([$table.'.*'])
            ->paginate();

        $steps = [];
        $currentStep = 0;

        if ($this->selectedOptions) {
            $steps = Option::query()
                ->join('option_value_to_options', 'options.id', '=', 'option_value_to_options.option_id')
                ->join('option_values', 'option_value_to_options.option_value_id', '=', 'option_values.id')
                ->whereIn('options.id', array_keys($this->selectedOptions))
                ->whereIn('option_values.id', array_values($this->selectedOptions))
                ->pluck('option_values.value', 'options.group_site')
                ->toArray();

            $currentStep = count($steps);
        }

        return view('livewire.store.share.products-list', [
            'products' => $products,
            'steps' => $steps,
            'currentStep' => $currentStep
        ]);
    }
}
