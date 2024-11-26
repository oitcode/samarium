<?php

if (! function_exists('has_module')) {
    function has_module(string $module): bool
    {
        return stripos(config('app.modules'), $module) !== false;
    }
}
