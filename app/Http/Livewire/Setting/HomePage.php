<?php

namespace App\Http\Livewire\Setting;

use App\Main\Setting\HomeSettings;
use Livewire\Component;

class HomePage extends Component
{
    public string $tabActive = 'banner';

    public $listeners = ['changeTabActive'];

    public array $tabs = [
        'banner' => 'Баннеры вверху',
        'meta' => 'Мета информация',
        'content' => 'Основной текст',
        'featured_products' => 'Рекомендуемые товары/коллекции',
    ];

    public array $setting;

    public function mount(HomeSettings $homeSettings)
    {
        $this->setting = $homeSettings->toArray();
    }

    public function addBanner()
    {
        $this->setting['banners'][] = [
            'title' => '',
            'text' => '',
            'link' => '',
            'image' => ''
        ];
    }

    public function removeBanner($index)
    {
        unset($this->setting['banners'][$index]);
        $this->setting['banners'] = array_values($this->setting['banners']);
    }

    public function removeProductBlock($index)
    {
        unset($this->setting['featured_products'][$index]);
        $this->setting['featured_products'] = array_values($this->setting['featured_products']);
    }

    public function addProductBlock()
    {
        $this->setting['featured_products'][] = [
            'group' => '',
            'products' => [],
        ];
    }

    public function addProductItem($index)
    {
        $this->setting['featured_products'][$index]['products'][] = '';
    }

    public function removeProductItem($blockIndex, $itemIndex)
    {
        unset($this->setting['featured_products'][$blockIndex]['products'][$itemIndex]);
        $this->setting['featured_products'][$blockIndex]['products'] = array_values($this->setting['featured_products'][$blockIndex]['products']);
    }

    public function save(HomeSettings $homeSettings)
    {
        $homeSettings->fill($this->setting)->save();
    }

    public function changeTabActive($value)
    {
        $this->tabActive = $value;
    }

    public function render()
    {
        return view('livewire.setting.home-page');
    }
}
