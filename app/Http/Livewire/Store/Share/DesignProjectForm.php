<?php

namespace App\Http\Livewire\Store\Share;

use Livewire\Component;

class DesignProjectForm extends Component
{
    public $name = '';
    public $phone = '';
    public $email = '';

    protected $rules = [
        'name' => 'required|string|min:1',
        'phone' => 'required_without:email|string',
        'email' => 'required_without:phone|string|email',
    ];

    public function send()
    {
        $this->validate();

        $this->reset(['name', 'phone', 'email']);

        return redirect()
            ->back()
            ->with('success', 'Спасибо за заявку! В ближайшее время с вами свяжется наш специалист.');
    }

    public function render()
    {
        return view('livewire.store.share.design-project-form');
    }
}
