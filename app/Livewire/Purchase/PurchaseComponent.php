<?php

namespace App\Livewire\Purchase;

use Livewire\Component;

use App\Purchase;

class PurchaseComponent extends Component
{
    public $displayingPurchase = null;

    public $modes = [
        'create' => false,
        'list' => false,
        'display' => false,
        'update' => false,
        'delete' => false,
        'search' => false,
    ];

    protected $listeners = [
        'clearModes',
        'displayPurchase',
        'exitPurchaseDisplay',
        'exitPurchaseCreate',
        'exitPurchaseDisplayMode',
    ];

    public function render()
    {
        return view('livewire.purchase.purchase-component');
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

    public function displayPurchase($purchaseId)
    {
        $purchase = Purchase::find($purchaseId);
        $this->displayingPurchase = $purchase;
        $this->enterMode('display');
    }

    public function exitPurchaseDisplay()
    {
        $this->displayingPurchase = null;

        $this->exitMode('display');
        $this->enterMode('list');
    }

    public function exitPurchaseCreate()
    {
        $this->exitMode('create');
    }

    public function exitPurchaseDisplayMode()
    {
        $this->exitPurchaseDisplay();
    }
}
