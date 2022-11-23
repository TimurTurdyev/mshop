<?php

namespace App\Http\Livewire\Store\Share;

use Livewire\Component;

class CallSpecialist extends Component
{
    public $name;
    public $phone;

    protected $rules = [
        'name' => 'required|string|min:1',
        'phone' => 'required|string|min:1',
    ];

    public function send()
    {
        $this->validate();

        $this->reset(['name', 'phone']);

        return redirect()
            ->back()
            ->with('success', 'Спасибо за заявку! В ближайшее время с вами свяжется наш специалист.');
    }

    public function render()
    {
        return view('livewire.store.share.call-specialist');
    }
}
