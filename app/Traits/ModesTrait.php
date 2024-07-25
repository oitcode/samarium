<?php

namespace App\Traits;

/**
 * Cbswei - A Laravel Livewire Application For Users
 *
 * @package  Cbswei
 * @author   _____
 */

trait ModesTrait
{
    /*
    |--------------------------------------------------------------------------
    | Modes Trait
    |--------------------------------------------------------------------------
    |
    | This trait can be used to add mode functionality to classes.
    | This is extensively used in our application.
    |
    */

    /*
    | Clear modes
    |
    | Clears all the modes.
    |
    */
    public function clearModes()
    {
        foreach ($this->modes as $key => $val) {
            $this->modes[$key] = false;
        }
    }

    /*
    | Enter mode
    |
    | Enter a particular mode. Before doing so quit
    | all other modes.
    |
    */
    public function enterMode($modeName)
    {
        $this->clearModes();

        $this->modes[$modeName] = true;
    }

    /*
    | Exit mode
    |
    | Exit a particular mode.
    |
    */
    public function exitMode($modeName)
    {
        $this->modes[$modeName] = false;
    }

    /*
    | Enter mode silent
    |
    | Enter a mode. However do not exit from other modes
    | while doing so.
    |
    */
    public function enterModeSilent($modeName)
    {
        $this->modes[$modeName] = true;
    }
}
