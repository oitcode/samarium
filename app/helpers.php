<?php

if (! function_exists('module_is')) {
    function module_is(string $module): bool
    {
        return false !== stripos(config('app.modules'), $module);
    }
}
