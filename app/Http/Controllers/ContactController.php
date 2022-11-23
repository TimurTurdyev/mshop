<?php

namespace App\Http\Controllers;

use function view;

class ContactController extends Controller
{
    public function __invoke()
    {
        return view('store.contact');
    }
}
