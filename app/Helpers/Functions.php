<?php

use App\Models\Setting;

if (!function_exists('clearNumber')) {
    function clearNumber($number)
    {
        return str_replace([',', '.'], '', $number);
    }
}

/**
 * Get value from setting tabel
 * 
 * @param mixed $name
 * 
 * @return mixed
 */
if (!function_exists('setting')) {
    function setting($name)
    {
        $setting = Setting::where('name', $name)->first();
        if ($setting) {
            return $setting->value;
        }
        return null;
    }
}
