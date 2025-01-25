<?php

namespace App\Livewire\Core;

use Livewire\Component;

class CorePurchaseDisplay extends Component
{
    public $purchase;

    public $display_toolbar = true;

    public $modes = [
        'showPayments' => false,
    ];

    public function render()
    {
        return view('livewire.core.core-purchase-display');
    }

    /* Clear modes */
    public function clearModes()
    {
        foreach ($this->modes as $key => $val) {
            $this->modes[$key] = false;
        }
    }

    /* Enter and exit mode */
    public function enterMode($modeName)
    {
        $this->clearModes();

        $this->modes[$modeName] = true;
    }

    public function exitMode($modeName)
    {
        $this->modes[$modeName] = false;
    }
}
