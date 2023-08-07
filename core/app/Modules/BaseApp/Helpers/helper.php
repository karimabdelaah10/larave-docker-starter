<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('activeListElement')) {
    function activeListElement($modulePrefix): string
    {
        $currentRoute = Route::currentRouteName();
        $currentRoute = explode('.', $currentRoute);
        $currentRoute = $currentRoute[0];
        if ($currentRoute == $modulePrefix) {
            return 'active';
        }
        return '';
    }
}
