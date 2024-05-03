<?php

namespace App\Traits;

trait ModesTrait
{
    /*
     *  Modes Trait
     *
     *  This trait can be used to add mode functionality to classes. 
     *  This is extensively used in our application.
     *
     */


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

    /* Exit mode */
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
