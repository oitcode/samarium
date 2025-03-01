<?php

namespace App\Livewire\Vendor;

use Livewire\Component;
use Illuminate\View\View;
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

    public function render(): View
    {
        return view('livewire.vendor.vendor-display');
    }

    public function exitSettlement(): void
    {
        $this->exitMode('settle');
    }

    public function makePurchasePayment($purchaseId): void
    {
        $purchase = Purchase::findOrFail($purchaseId);

        $this->paymentMakingPurchase = $purchase;

        $this->enterMode('purchasePaymentCreate');
    }

    public function exitPurchasePaymentCreateMode(): void
    {
        $this->paymentMakingPurchase = null;
        $this->exitMode('purchasePaymentCreate');
    }

    public function vendorPurchasePaymentMade(): void
    {
        $this->exitMode('purchasePaymentCreate');
    }

    public function displayPurchase(Purchase $purchase): void
    {
        $this->displayingPurchase = $purchase; 

        $this->enterMode('purchaseDisplay');
    }

    public function vendorUpdateNameCompleted(): void
    {
        session()->flash('message', 'Vendor name updated');
        $this->exitMode('updateNameMode');
    }

    public function vendorUpdateNameCancelled(): void
    {
        $this->exitMode('updateNameMode');
    }

    public function vendorUpdateEmailCompleted(): void
    {
        session()->flash('message', 'Vendor email updated');
        $this->exitMode('updateEmailMode');
    }

    public function vendorUpdateEmailCancelled(): void
    {
        $this->exitMode('updateEmailMode');
    }

    public function vendorUpdatePhoneCompleted(): void
    {
        session()->flash('message', 'Vendor phone updated');
        $this->exitMode('updatePhoneMode');
    }

    public function vendorUpdatePhoneCancelled(): void
    {
        $this->exitMode('updatePhoneMode');
    }

    public function vendorUpdatePanCompleted(): void
    {
        session()->flash('message', 'Vendor PAN updated');
        $this->exitMode('updatePanMode');
    }

    public function vendorUpdatePanCancelled(): void
    {
        $this->exitMode('updatePanMode');
    }
}
