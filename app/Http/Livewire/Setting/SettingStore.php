<?php

namespace App\Http\Livewire\Setting;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Livewire\Component;

class SettingStore extends Component
{
    public string $tabActive = 'main';

    public array $tabs = [
        'main' => 'Основное',
        'menu_top' => 'Меню верх',
        'menu_main' => 'Меню основное',
        'menu_footer' => 'Меню низ',
    ];

    public array $store = [
        'phone' => '',
        'address' => '',
        'title' => '',
        'meta_description' => '',
        'menu_top' => [],
        'menu_main' => [],
        'menu_footer' => [
            'column1' => [],
            'column2' => [],
            'column3' => [],
            'column4' => []
        ]
    ];

    public $listeners = ['changeTabActive'];

    public function mount()
    {
        foreach ($this->store as $key => &$value) {
            $value = setting($key);

            if (Str::isJson($value)) {
                $value = json_decode($value, 1);
            }
        }
    }

    public function save()
    {
        foreach ($this->store as $key => $value) {
            $prop_value = $value;

            if (is_array($prop_value)) {
                $prop_value = json_encode($prop_value, JSON_PRETTY_PRINT);
            }

            setting([$key => $prop_value]);
        }

        setting()->save();
    }

    public function addMenuItem($key)
    {
        if (Arr::has($this->store, $key)) {
            $item = Arr::get($this->store, $key);
            $item[] = [
                'link' => '',
                'title' => ''
            ];
            Arr::set($this->store, $key, $item);
        }
    }

    public function removeMenuItem($key)
    {
        if (Arr::has($this->store, $key)) {
            Arr::pull($this->store, $key);

            $find_key = str($key)
                ->explode('.')
                ->slice(0, -1)
                ->join('.');

            $item = Arr::get($this->store, $find_key);

            Arr::set($this->store, $find_key, array_values($item));
        }
    }

    public function changeTabActive($value)
    {
        $this->tabActive = $value;
    }

    public function render()
    {
        return view('livewire.setting.setting-store');
    }
}
