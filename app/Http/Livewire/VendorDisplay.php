<?php

namespace App\Http\Livewire;

use Livewire\Component;

class VendorDisplay extends Component
{
    public $vendor;

    public $modes = [
        'purchaseList' => false,
        'pendingBills' => false,
        'settle' => false,
    ];

    protected $listeners = [
        'exitSettlement',
        'vendorSettlementMade' => 'exitSettlement',
    ];

    public function render()
    {
        return view('livewire.vendor-display');
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

    public function exitSettlement()
    {
        $this->exitMode('settle');
    }
}
