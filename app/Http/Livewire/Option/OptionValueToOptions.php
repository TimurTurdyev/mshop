<?php

namespace App\Http\Livewire\Option;

use App\Models\Option;
use App\Models\OptionValue;
use Livewire\Component;
use Livewire\WithPagination;

class OptionValueToOptions extends Component
{
    use WithPagination;

    public Option $option;

    public array $option_value_idx = [];

    protected string $paginationTheme = 'bootstrap';

    public string $search = '';

    public string $title = 'Значение опций товара';

    protected $listeners = [
        'optionValueAdded' => '$refresh',
    ];

    public function mount()
    {
        $this->option_value_idx = $this->option->optionValues->map(fn($value) => $value->id)->toArray();
    }

    public function updatedOptionValueIdx($idx)
    {
        $this->option->optionValues()->sync($idx);
        $this->emitSelf('optionValueAdded');
    }

    public function delete(OptionValue $optionValue)
    {
        $optionValue->delete();
    }

    public function render()
    {
        return view('livewire.option.option-value-to-options', [
            'optionValues' => OptionValue::query()->when($this->option_value_idx, function ($q, $idx) {
                return $q->whereNotIn('id', $idx);
            })->orderByDesc('id')->paginate(50),
            'optionValueToOptions' => $this->option->optionValues
        ]);
    }
}
