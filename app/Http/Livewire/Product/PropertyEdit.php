<?php

namespace App\Http\Livewire\Product;

use App\Models\Option;
use App\Models\OptionValue;
use App\Models\Price;
use App\Models\Property;
use Illuminate\Validation\Rule;
use Livewire\Component;

class PropertyEdit extends Component
{
    public array $options;
    public array $optionValues = [];
    public Property $property;

    protected $listeners = [
        'propertyUpdate' => '$refresh',
    ];

    public function mount()
    {
        $this->options = Option::get(['id', 'group_admin'])->toArray();

        if ($this->property->option_id) {
            $this->optionValues = OptionValue::where('option_id', $this->property->option_id)
                ->get(['id', 'value'])
                ->toArray();
        }
    }

    protected function rules()
    {
        return [
            'property.option_id' => [
                'required',
                'integer',
                Rule::unique('properties', 'option_id')
                    ->where('price_id', $this->property->price_id)
                    ->ignore($this->property->id),
            ],
            'property.option_value_id' => [
                'required',
                'integer',
                Rule::unique('properties', 'option_value_id')
                    ->where('price_id', $this->property->price_id)
                    ->where('option_id', $this->property->option_id)
                    ->ignore($this->property->id),
            ],
        ];
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function updatedPropertyOptionId($newValue)
    {
        $this->property->fill(['option_id' => $newValue])->save();
        $this->optionValues = OptionValue::where('option_id', $newValue)
            ->get(['id', 'value'])
            ->toArray();
    }

    public function updatedPropertyOptionValueId($newValue)
    {
        $this->property->fill(['option_value_id' => $newValue])->save();
    }

    public function delete(Property $property)
    {
        $property->delete();
        $this->emitUp('propertyUpdate');
    }

    public function render()
    {
        return view('livewire.product.property-edit');
    }
}
