<?php

namespace App\Http\Controllers;

use function view;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('store.home');
    }
}
