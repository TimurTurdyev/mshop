<?php

namespace App\Http\Livewire\Setting;

use App\Main\Setting\GeneralSettings;
use Illuminate\Support\Arr;
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

    public array $store = [];

    public $listeners = ['changeTabActive'];

    public function mount(GeneralSettings $setting)
    {
        $this->store = $setting->toArray();
    }

    public function save(GeneralSettings $generalSettings)
    {
        $generalSettings->fill($this->store)->save();
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
