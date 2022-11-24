<?php

namespace App\Http\Livewire\Store\Share;

use Livewire\Component;

class CallForm extends Component
{
    public $name = '';
    public $phone = '';
    public $email = '';
    public $showEmail = false;
    public $emitName = '';
    public $buttonTitle = 'Вызвать специалиста';

    protected $rules = [
        'name' => 'required|string|min:1',
        'phone' => 'required_without:email|string',
        'email' => 'required_without:phone|string|email',
    ];

    public function send()
    {
        $data = $this->validate();

        $this->reset(['name', 'phone', 'email']);

        if (!$this->emitName) {
            return redirect()
                ->back()
                ->with('success', 'Спасибо за заявку! В ближайшее время с вами свяжется наш специалист.');
        }

        $this->emit($this->emitName, $data);
    }

    public function render()
    {
        return view('livewire.store.share.call-form');
    }
}
