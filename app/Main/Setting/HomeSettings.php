<?php

namespace App\Main\Setting;

use Spatie\LaravelSettings\Settings;

class HomeSettings extends Settings
{
    public string $meta_title;
    public string $meta_description;
    public string $meta_icon;
    public string $heading;
    public string $text;
    public array $banners;
    public array $featured_products;

    public static function group(): string
    {
        return 'home';
    }
}
