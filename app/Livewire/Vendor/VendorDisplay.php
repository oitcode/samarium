<?php

namespace App\Livewire\Vendor;

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
        'updateNameMode' => false,
        'updateEmailMode' => false,
        'updatePhoneMode' => false,
        'updatePanMode' => false,
    ];

    protected $listeners = [
        'exitSettlement',
        'vendorSettlementMade' => 'exitSettlement',
        'makePurchasePayment',
        'exitPurchasePaymentCreateMode',
        'vendorPurchasePaymentMade',
        'displayPurchase',

        'vendorUpdateNameCompleted',
        'vendorUpdateNameCancelled',

        'vendorUpdateEmailCompleted',
        'vendorUpdateEmailCancelled',

        'vendorUpdatePhoneCompleted',
        'vendorUpdatePhoneCancelled',

        'vendorUpdatePanCompleted',
        'vendorUpdatePanCancelled',
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

    public function vendorUpdateNameCompleted()
    {
        session()->flash('message', 'Vendor name updated');
        $this->exitMode('updateNameMode');
    }

    public function vendorUpdateNameCancelled()
    {
        $this->exitMode('updateNameMode');
    }

    public function vendorUpdateEmailCompleted()
    {
        session()->flash('message', 'Vendor email updated');
        $this->exitMode('updateEmailMode');
    }

    public function vendorUpdateEmailCancelled()
    {
        $this->exitMode('updateEmailMode');
    }

    public function vendorUpdatePhoneCompleted()
    {
        session()->flash('message', 'Vendor phone updated');
        $this->exitMode('updatePhoneMode');
    }

    public function vendorUpdatePhoneCancelled()
    {
        $this->exitMode('updatePhoneMode');
    }

    public function vendorUpdatePanCompleted()
    {
        session()->flash('message', 'Vendor PAN updated');
        $this->exitMode('updatePanMode');
    }

    public function vendorUpdatePanCancelled()
    {
        $this->exitMode('updatePanMode');
    }
}
