<?php

if (!function_exists('settingMenu')) {
    function settingMenu($key)
    {
        $value = setting($key);
        if (Str::isJson($value)) {
            return json_decode($value, 1);
        }
        return [];
    }
}
