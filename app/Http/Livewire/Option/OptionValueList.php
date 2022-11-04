<?php

namespace App\Http\Livewire\Option;

use App\Models\Option;
use App\Models\OptionValue;
use Livewire\Component;
use Livewire\WithPagination;

class OptionValueList extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    public string $search = '';

    public string $title = 'Значение опций товара';

    public Option $option;

    protected $listeners = [
        'optionValueAdded' => '$refresh',
    ];

    public function delete(OptionValue $optionValue)
    {
        $optionValue->delete();
    }

    public function render()
    {
        return view('livewire.option.option-value-list', [
            'optionValues' => $this->option->optionValues()->orderByDesc('id')->paginate(50)
        ]);
    }
}
