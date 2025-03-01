<?php

namespace App\Livewire\Purchase;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use App\Purchase;

class PurchaseComponent extends Component
{
    use ModesTrait;
    
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

    public function render(): View
    {
        return view('livewire.purchase.purchase-component');
    }

    public function displayPurchase($purchaseId): void
    {
        $purchase = Purchase::find($purchaseId);
        $this->displayingPurchase = $purchase;
        $this->enterMode('display');
    }

    public function exitPurchaseDisplay(): void
    {
        $this->displayingPurchase = null;

        $this->exitMode('display');
        $this->enterMode('list');
    }

    public function exitPurchaseCreate(): void
    {
        $this->exitMode('create');
    }

    public function exitPurchaseDisplayMode(): void
    {
        $this->exitPurchaseDisplay();
    }
}
