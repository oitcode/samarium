<?php

namespace App\Livewire\Core;

use Livewire\Component;

class CorePurchaseDisplay extends Component
{
    public $purchase;

    public $display_toolbar = true;

    public function render(): View
    {
        return view('livewire.core.core-purchase-display');
    }
}
