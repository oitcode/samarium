<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use App\SaleInvoice;

class CustomerDetail extends Component
{
    use ModesTrait;

    public $customer;

    public $paymentReceivingSaleInvoice;

    public $displayingSaleInvoice = null;

    public $modes = [
        'salesHistory' => false,
        'customerPaymentCreate' => false,
        'saleInvoicePaymentCreate' => false,
        'ledger' => false,
        'saleInvoiceDisplay' => false,
        'customerCommentCreateMode' => false,
        'customerDocumentFileCreateMode' => false,
        'educApplicationCreateMode' => false,
        'updateNameMode' => false,
        'updateEmailMode' => false,
        'updatePhoneMode' => false,
        'updatePanMode' => false,
    ];

    protected $listeners = [
        'customerPaymentMade',
        'receiveSaleInvoicePayment',
        'exitCustomerPaymentCreateMode',
        'exitSaleInvoicePaymentCreateMode',
        'customerSiPaymentMade',
        'displaySaleInvoice',
        'exitSaleInvoiceDisplayMode',

        'customerCommentCreateCompleted',
        'customerCommentCreateCancelled',

        'customerDocumentFileCreateCompleted',
        'customerDocumentFileCreateCancelled',

        'educApplicationCreateCancelled',
        'educApplicationCreateCompleted',

        'customerUpdateNameCompleted',
        'customerUpdateNameCancelled',

        'customerUpdateEmailCompleted',
        'customerUpdateEmailCancelled',

        'customerUpdatePhoneCompleted',
        'customerUpdatePhoneCancelled',

        'customerUpdatePanCompleted',
        'customerUpdatePanCancelled',
    ];


    public function render(): View
    {
        return view('livewire.customer.customer-detail');
    }

    public function customerPaymentMade($amountRemaining): void
    {
        $this->clearModes();
    }

    public function customerSiPaymentMade(): void
    {
        $this->exitMode('saleInvoicePaymentCreate');
    }

    public function receiveSaleInvoicePayment($saleInvoiceId): void
    {
        $saleInvoice = SaleInvoice::findOrFail($saleInvoiceId);

        $this->paymentReceivingSaleInvoice = $saleInvoice;

        $this->enterMode('saleInvoicePaymentCreate');
    }

    public function exitCustomerPaymentCreateMode(): void
    {
        $this->exitMode('customerPaymentCreate');
    }

    public function exitSaleInvoicePaymentCreateMode(): void
    {
        $this->paymentReceivingSaleInvoice = null;
        $this->exitMode('saleInvoicePaymentCreate');
    }

    public function displaySaleInvoice(SaleInvoice $saleInvoice): void
    {
        $this->displayingSaleInvoice = $saleInvoice; 

        $this->enterMode('saleInvoiceDisplay');
    }

    public function exitSaleInvoiceDisplayMode(): void
    {
        $this->exitMode('saleInvoiceDisplay');
        $this->enterMode('salesHistory');
    }

    public function customerCommentCreateCancelled(): void
    {
        $this->exitMode('customerCommentCreateMode');
    }

    public function customerCommentCreateCompleted(): void
    {
        $this->exitMode('customerCommentCreateMode');
    }

    public function customerDocumentFileCreateCancelled(): void
    {
        $this->exitMode('customerDocumentFileCreateMode');
    }

    public function customerDocumentFileCreateCompleted(): void
    {
        $this->exitMode('customerDocumentFileCreateMode');
    }

    public function educApplicationCreateCancelled(): void
    {
        $this->exitMode('educApplicationCreateMode');
    }

    public function educApplicationCreateCompleted(): void
    {
        $this->exitMode('educApplicationCreateMode');
    }

    public function customerUpdateNameCompleted(): void
    {
        session()->flash('message', 'Customer name updated');
        $this->exitMode('updateNameMode');
    }

    public function customerUpdateNameCancelled(): void
    {
        $this->exitMode('updateNameMode');
    }

    public function customerUpdateEmailCompleted(): void
    {
        session()->flash('message', 'Customer email updated');
        $this->exitMode('updateEmailMode');
    }

    public function customerUpdateEmailCancelled(): void
    {
        $this->exitMode('updateEmailMode');
    }

    public function customerUpdatePhoneCompleted(): void
    {
        session()->flash('message', 'Customer phone updated');
        $this->exitMode('updatePhoneMode');
    }

    public function customerUpdatePhoneCancelled(): void
    {
        $this->exitMode('updatePhoneMode');
    }

    public function customerUpdatePanCompleted(): void
    {
        session()->flash('message', 'Customer PAN updated');
        $this->exitMode('updatePanMode');
    }

    public function customerUpdatePanCancelled(): void
    {
        $this->exitMode('updatePanMode');
    }
}
