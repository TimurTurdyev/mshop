<?php

namespace App\Http\Livewire;

use Illuminate\Validation\Rule;

trait PageLivewireTrait
{
    public $page = [
        'meta_title' => '',
        'meta_description' => '',
        'text_html' => '',
    ];

    public function mountPage($model) {
        if ($model->exists) {
            $this->page = [...$this->page, ...$model->page->toArray()];
        }
    }

    public function getPageRules()
    {
        return [
            'page.meta_title' => 'required|string|max:255',
            'page.meta_description' => 'required|string|max:255',
            'page.text_html' => 'string|min:0',
        ];
    }

    public function savePage($model)
    {
        $model
            ->page
            ->fill($this->page)
            ->save();
    }

    public function saveModelAndPage($model, $prepareForValidation = [])
    {
        $this->validate([...$this->rules(), ...$this->getPageRules()]);

        foreach ($prepareForValidation as $fill => $value) {
            if (!$model->{$fill}) {
                $model->{$fill} = $value;
            }
        }

        $model->slug = str($model->slug)->slug();

        $model->save();

        $model
            ->page
            ->fill($this->page)
            ->save();
    }
}
