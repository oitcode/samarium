<?php

namespace App\Traits;

trait ModesTrait
{
    /* Clear modes */
    public function clearModes()
    {
        foreach ($this->modes as $key => $val) {
            $this->modes[$key] = false;
        }
    }

    /* Enter mode */
    public function enterMode($modeName)
    {
        $this->clearModes();

        $this->modes[$modeName] = true;
    }

    /* Enter mode */
    public function exitMode($modeName)
    {
        $this->modes[$modeName] = false;
    }

    /* Enter mode sliently */
    public function enterModeSilent($modeName)
    {
        $this->modes[$modeName] = true;
    }
}
