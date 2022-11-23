<?php

namespace App\Main\Setting;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $site_name;

    public bool $site_active;

    public string $phone;
    public string $address;

    public array $menu_top;
    public array $menu_main;
    public array $menu_footer;

    public static function group(): string
    {
        return 'general';
    }
}
