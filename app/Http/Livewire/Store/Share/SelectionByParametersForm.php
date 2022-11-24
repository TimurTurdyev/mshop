<?php

namespace App\Http\Livewire\Store\Share;

use Livewire\Component;

class SelectionByParametersForm extends Component
{
    public $listeners = [
        'office_selection' => 'formSend'
    ];

    public $choices = [];
    public $choice = '';
    public $showSucces = false;

    public $steps = [
        'Стиль кабинета',
        'Материал и декор',
        'Страна производитель',
        'Площадь кабинета',
    ];

    private $variants = [
        [
            'Классический',
            'Современный',
            'Минимализм',
            'Дизайнерские',
            'Домашний',
            'Хай-тек',
            'Лофт',
            'Не знаю. Нужен совет дизайнера',
        ],
        [
            'МДФ',
            'Шпон',
            'Массив',
            'Стекло',
            'с Кожаной вставкой',
            'с Сукном',
            'Не имеет значения',
        ],
        [
            'Россия',
            'Италия',
            'Белоруссия',
            'Китай',
            'Испания',
            'с Турция',
            'Не имеет значения',
        ]
    ];

    public function render()
    {
        $contents = [
            [
                'title' => 'Выберите стиль кабинета',
                'image' => '/dist/images/select-parameters-step-1.jpg'
            ], [
                'title' => 'Выберите материл и декор кабинета',
                'image' => '/dist/images/select-parameters-step-2.jpg'
            ],
            [
                'title' => 'Выберите страну производителя мебели',
                'image' => '/dist/images/select-parameters-step-3.jpg'
            ],
            [
                'title' => 'Параметры помещения',
                'image' => '/dist/images/select-parameters-step-4.jpg'
            ],
            [
                'title' => 'Отличный выбор!',
                'image' => '/dist/images/select-parameters-step-final.jpg'
            ]
        ];

        $index = count($this->choices);
        $content = $contents[$index] ?? ['title' => '', 'image' => '',];

        return view('livewire.store.share.selection-by-parameters-form', [
            'index' => $index,
            'variants' => $this->variants[$index] ?? [],
            'content' => $content,
        ]);
    }

    public function tab($index)
    {
        $this->choice = $this->choices[$index] ?? '';
        $this->choices = array_slice($this->choices, 0, $index);
    }

    public function next($index = 0)
    {
        if ($index !== count($this->choices)) {
            return redirect()
                ->back()
                ->with('error', 'Oops. Something went wrong.');
        }

        $this->validate([
            'choice' => 'required'
        ]);

        $this->choices[] = $this->choice;
        $this->choice = '';
    }

    public function formSend($data)
    {
        // Todo: send choices to email

        // Reset choices
        $this->choices = [];
        $this->showSucces = true;
    }
}
