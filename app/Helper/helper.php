<?php

if (!function_exists('is_active_menu')) {

    function is_active_menu(string $route_name): string
    {
        return \Illuminate\Support\Facades\Route::currentRouteName() === $route_name ? 'text-gray-800 ' : '';
    }


}
