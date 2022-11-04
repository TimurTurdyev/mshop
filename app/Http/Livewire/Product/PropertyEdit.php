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

    public function mount()
    {
        if ($this->property->option_id) {
            $this->setOptionValues($this->property->option_id);
        }
    }

    protected function rules()
    {
        return [
            'property.option_id' => [
                'required',
                'integer',
                Rule::unique('properties', 'option_id')
                    ->where('property_id', $this->property->property_id)
                    ->where('property_type', $this->property->property_type)
                    ->ignore($this->property->id),
            ],
            'property.option_value_id' => [
                'required',
                'integer',
                Rule::unique('properties', 'option_value_id')
                    ->where('property_id', $this->property->property_id)
                    ->where('property_type', $this->property->property_type)
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
        $this->setOptionValues($newValue);

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

    private function setOptionValues($option_id)
    {
        $this->optionValues = OptionValue::where('option_id', $option_id)
            ->get(['id', 'value'])
            ->toArray();
    }
}
