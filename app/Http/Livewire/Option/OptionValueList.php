<?php

namespace App\Http\Livewire\Option;

use App\Models\OptionValue;
use Livewire\Component;
use Livewire\WithPagination;

class OptionValueList extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    public string $search = '';

    public array $option_value_idx = [];

    public string $title = 'Значение опций товара';

    protected $listeners = [
        'refreshOptionValues' => '$refresh',
        'delete'
    ];

    public function updatedOptionValueIdx()
    {
        $this->emitUp('optionValueChange', $this->option_value_idx);
    }

    public function delete(OptionValue $optionValue)
    {
        $id = $optionValue->id;
        $optionValue->delete();
        $this->emitUp('optionValueChange',
            array_filter($this->option_value_idx, fn($value) => $value != $id)
        );
    }

    public function render()
    {
        return view('livewire.option.option-value-list', [
            'optionValues' => OptionValue::query()->when($this->option_value_idx, function ($q, $idx) {
                $q->whereNotIn('id', $idx);
            })->when($this->search, function ($q, $search) {
                $q->where(function ($q) use ($search) {
                    $q
                        ->where('value_admin', 'like', '%'.$search.'%')
                        ->orWhere('value', 'like', '%'.$search.'%');
                });
            })->orderByDesc('id')->paginate(50),
        ]);
    }
}
