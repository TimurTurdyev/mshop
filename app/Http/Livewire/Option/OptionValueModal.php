<?php

namespace App\Http\Livewire\Option;

use App\Models\Option;
use App\Models\OptionValue;
use Livewire\Component;

class OptionValueModal extends Component
{
    public int $option_id = 0;
    public OptionValue $optionValue;

    public $listeners = [
        'editOptionValue',
    ];

    public function editOptionValue(OptionValue $optionValue)
    {
        $this->optionValue = $optionValue;
    }

    public function mount(OptionValue $optionValue)
    {
        $this->optionValue = $optionValue;
    }

    protected array $rules = [
        'optionValue.value' => 'required|string|min:6',
        'optionValue.image' => 'required|string|max:255',
    ];

    public function save()
    {
        $this->validate();

        if (!$this->optionValue->exists) {
            $this->optionValue->option_id = $this->option_id;
        }

        if (!$this->optionValue->image) {
            $this->optionValue->image = '';
        }

        $this->optionValue->save();
        $this->optionValue = new OptionValue();
        $this->dispatchBrowserEvent('optionValueModalClose');
        $this->emitUp('optionValueAdded');
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.option.option-value-modal');
    }
}
