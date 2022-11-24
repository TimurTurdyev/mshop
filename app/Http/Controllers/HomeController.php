<?php

namespace App\Http\Controllers;

use App\Main\Setting\HomeSettings;
use function view;

class HomeController extends Controller
{
    public function __invoke(HomeSettings $homeSettings)
    {
        return view('store.home', [
            'homeSettings' => $homeSettings,
        ]);
    }
}
