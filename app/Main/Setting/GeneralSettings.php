<?php

namespace App\Main\Setting;

use Spatie\LaravelSettings\Settings;

/*
 * 'phone' => '',
        'address' => '',
        'title' => '',
        'meta_description' => '',
        'menu_top' => [],
        'menu_main' => [],
        'menu_footer' => [
            'column1' => [],
            'column2' => [],
            'column3' => [],
            'column4' => []
        ]
 */

class GeneralSettings extends Settings
{
    public string $site_name;

    public bool $site_active;

    public string $phone;
    public string $address;

    public array $menu_top;
    public array $menu_main;
    public array $menu_footer = [
        'column1' => [],
        'column2' => [],
        'column3' => [],
        'column4' => []
    ];

    public static function group(): string
    {
        return 'general';
    }
}
