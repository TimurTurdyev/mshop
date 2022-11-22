<?php

namespace App\Http\Livewire\Option;

use App\Models\OptionValue;
use Livewire\Component;

class OptionValueModal extends Component
{
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
        'optionValue.value_admin' => 'nullable|string|max:255',
        'optionValue.value' => 'required|string|min:2|max:255',
        'optionValue.image' => 'nullable|string|max:255',
    ];

    public function save()
    {
        $this->validate();

        if (!$this->optionValue->value_admin) {
            $this->optionValue->value_admin = '';
        }

        if (!$this->optionValue->image) {
            $this->optionValue->image = '';
        }

        $this->optionValue->save();
        $this->optionValue = new OptionValue();
        $this->dispatchBrowserEvent('optionValueModalClose');
        $this->emitUp('refreshOptionValues');
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.option.option-value-modal');
    }
}
