<?php

namespace App\Http\Livewire\Store;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait PricesToEntitiesTrait
{
    public Model $model;
    public string $name;
    public string $heading;
    public int $selectPriceId = 0;
    public array $selectProperties = [];
    public int $selectPriceValue = 0;
    public array $images = [];
    public array $options = [];
    public array $prices = [];
    public int $currentStep = 0;
    public array $steps = [];

    public function queryString()
    {
        return [
            'selectPriceId' => ['except' => 0, 'as' => 'price'],
        ];
    }

    public string $hash;

    public function mount()
    {
        $this->init();
        $this->clearInit();
        $this->makeStepEnd();
        $this->makeDefault();
    }

    public function optionChange($group, $price, $currentStep = 0)
    {
        $this->selectPriceId = 0;
        $this->selectProperties = [];
        $this->steps[$group] = $price;
        $this->currentStep = $currentStep;

        $this->init();
        $this->clearInit();
        $this->makeStepEnd();
        $this->makeDefault();

        $this->emitSelf('changeProperties', $this->selectProperties);
    }

    public function init()
    {
        $this->images = $this->model->images ?: [];
        $this->name = $this->model->name;

        $this->options = [];

        $prices = $this->model
            ->prices()
            ->where('status', 1)
            ->with([
                'properties' => function (MorphMany $query) {
                    $query
                        ->select([
                            'properties.*',
                            'options.group_site as option_name',
                            'option_values.value as option_value',
                            'option_values.image as option_value_image',
                        ])
                        ->join(
                            'options',
                            'properties.option_id',
                            '=',
                            'options.id'
                        )
                        ->join(
                            'option_values',
                            'properties.option_value_id',
                            '=',
                            'option_values.id'
                        );
                },
            ])
            ->get();

        foreach ($prices as $item) {

            if ($this->selectPriceId === $item->id) {
                foreach ($item->properties as $property) {
                    $groupKey = $property->option_name;
                    $valueKey = $property->option_value;
                    $this->steps[$groupKey] = $valueKey;
                }
                $this->currentStep = count($this->steps);
            }

            $this->prices[$item->id] = [
                'name' => $item->name ?? $this->model->name,
                'price' => $item->price,
                'images' => $item->images,
                'hash_properties' => $item->properties->map(function ($value) {
                    return $value->option_name.$value->option_value;
                })->implode(''),
                'properties' => $item->properties->mapWithKeys(function ($value, $key) {
                    return [$value->option_id => $value->option_value_id];
                })->toArray()
            ];

            /*
             *       [46 - 47, 48 - 49, 50]
             *         |    \ /      |
             *         |    /  \     |
             *       [46 - 48, 47 - 49]
             */

            $hash = '';
            $prevGroupKey = '';
            $prevValueKey = '';
            foreach ($item->properties as $index => $property) {
                if (!isset($property->option_value)) {
                    continue;
                }

                $groupKey = $property->option_name;
                $valueKey = $property->option_value;

                if (!isset($this->options[$groupKey][$valueKey])) {
                    $this->options[$groupKey][$valueKey] = [
                        'image' => $property->option_value_image,
                        'parents' => [],
                        'isSelected' => false,
                    ];
                }

                $hash .= $prevGroupKey.$prevValueKey;

                if ($index > 0) {
                    $this->options[$groupKey][$valueKey]['parents'][] = $hash;
                }

                $prevGroupKey = $groupKey;
                $prevValueKey = $valueKey;
            }
        }
    }

    public function clearInit()
    {
        $keys = array_keys($this->steps);
        $outputs = array_slice($keys, $this->currentStep + 1);

        foreach ($outputs as $key) {
            unset($this->steps[$key]);
        }

        $index = 0;
        $hash = '';

        foreach ($this->options as $groupKey => &$options) {
            if ($index == 0) {
                $index++;
                continue;
            }

            $currentKey = key($this->steps);
            next($this->steps);

            if (!$currentKey) {
                unset($this->options[$groupKey]);
                continue;
            }

            $hash .= $currentKey.$this->steps[$currentKey];

            foreach ($options as $key => $values) {
                $saved = false;
                foreach ($values['parents'] as $value) {
                    if ($value === $hash) {
                        $saved = true;
                    }
                }
                if (!$saved) {
                    unset($options[$key]);
                }
            }

            if (!$options) {
                unset($this->options[$groupKey]);
            }
        }
        $this->hash = $hash;
    }

    public function makeStepEnd()
    {
        $countSteps = count($this->steps);

        if ($this->currentStep === 0 && $countSteps === 0) {
            return;
        }

        foreach ($this->steps as $step => $value) {
            $this->options[$step][$value]['isSelected'] = true;
        }

        if ($countSteps === count($this->options)) {
            $hash = collect($this->steps)->implode(function ($value, $key) {
                return $key.$value;
            }, '');

            foreach ($this->prices as $id => $price) {
                if ($price['hash_properties'] === $hash) {
                    $this->selectPriceId = $id;
                    $this->images = $price['images'];
                    $this->name = $this->name.' '.$price['name'];
                    $this->selectPriceValue = $price['price'];
                    $this->selectProperties = $price['properties'];
                }
            }
        }
    }

    private function makeDefault()
    {
        if (
            $this->selectPriceId &&
            $this->prices &&
            !empty($this->prices[$this->selectPriceId])
        ) {
            $price = $this->prices[$this->selectPriceId];

            $this->images = $price['images'];
            $this->selectPriceValue = $price['price'];
            $this->name = $price['name'];
        }

        if (!$this->selectPriceId) {
            $hash = collect($this->steps)->implode(function ($value, $key) {
                return $key.$value;
            }, '');

            $hashExist = false;

            foreach ($this->prices as $price) {
                if (str($price['hash_properties'])->startsWith($hash)) {
                    $hashExist = true;
                    $this->images = [...$this->images, ...$price['images']];
                    if ($this->selectPriceValue === 0) {
                        $this->selectPriceValue = $price['price'];
                    } else {
                        $this->selectPriceValue = min($this->selectPriceValue, $price['price']);
                    }
                }
            }

            if (!$hashExist) {
                foreach ($this->prices as $priceId => $price) {
                    $this->images = [...$this->images, ...$price['images']];
                    if ($this->selectPriceValue === 0) {
                        $this->selectPriceValue = $price['price'];
                    } else {
                        $this->selectPriceValue = min($this->selectPriceValue, $price['price']);
                    }
                }
            }
        }
    }
}
