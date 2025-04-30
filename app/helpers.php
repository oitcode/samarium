<?php

if (! function_exists('has_module')) {
    function has_module(string $module): bool
    {
        return config('app.modules.' . $module) == true;
    }
}
