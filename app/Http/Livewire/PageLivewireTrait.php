<?php

namespace App\Http\Livewire;

use Illuminate\Validation\Rule;

trait PageLivewireTrait
{
    public $page = [
        'slug' => '',
        'meta_title' => '',
        'meta_description' => '',
        'meta_keyword' => '',
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
            'page.slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('pages', 'slug')->ignore($this->page['id'] ?? 0),
            ],
            'page.meta_title' => 'required|string|max:255',
            'page.meta_description' => 'required|string|max:255',
            'page.meta_keyword' => 'required|string|max:255',
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
        $this->validate([...$this->rules, ...$this->getPageRules()]);

        foreach ($prepareForValidation as $fill => $value) {
            if (!$model->{$fill}) {
                $model->{$fill} = $value;
            }
        }

        $model->save();

        $this->page['slug'] = str($this->page['slug'])->slug();

        $model
            ->page
            ->fill($this->page)
            ->save();
    }
}
