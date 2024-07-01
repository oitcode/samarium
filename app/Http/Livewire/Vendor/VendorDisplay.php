<?php

namespace App\Http\Livewire\Vendor;

use Livewire\Component;

use App\Traits\ModesTrait;

use App\Purchase;

class VendorDisplay extends Component
{
    use ModesTrait;

    public $vendor;

    public $paymentMakingPurchase;

    public $displayingPurchase = null;

    public $modes = [
        'purchaseList' => false,
        'pendingBills' => false,
        'settle' => false,
        'purchasePaymentCreate' => false,
        'purchaseDisplay' => false,
    ];

    protected $listeners = [
        'exitSettlement',
        'vendorSettlementMade' => 'exitSettlement',
        'makePurchasePayment',
        'exitPurchasePaymentCreateMode',
        'vendorPurchasePaymentMade',
        'displayPurchase',
    ];

    public function render()
    {
        return view('livewire.vendor.vendor-display');
    }

    public function exitSettlement()
    {
        $this->exitMode('settle');
    }

    public function makePurchasePayment($purchaseId)
    {
        $purchase = Purchase::findOrFail($purchaseId);

        $this->paymentMakingPurchase = $purchase;

        $this->enterMode('purchasePaymentCreate');
    }

    public function exitPurchasePaymentCreateMode()
    {
        $this->paymentMakingPurchase = null;
        $this->exitMode('purchasePaymentCreate');
    }

    public function vendorPurchasePaymentMade()
    {
        $this->exitMode('purchasePaymentCreate');
    }

    public function displayPurchase(Purchase $purchase)
    {
        $this->displayingPurchase = $purchase; 

        $this->enterMode('purchaseDisplay');
    }
}
