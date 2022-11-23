<?php

namespace App\View\Components\Layouts;

use App\Main\Setting\GeneralSettings;
use Illuminate\View\Component;

class Store extends Component
{
    private GeneralSettings $generalSettings;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(GeneralSettings $generalSettings)
    {
        $this->generalSettings = $generalSettings;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.store', [
            'generalSettings' => $this->generalSettings
        ]);
    }
}
