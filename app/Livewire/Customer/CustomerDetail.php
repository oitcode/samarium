<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use App\SaleInvoice;

class CustomerDetail extends Component
{
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
    ];


    public function render()
    {
        return view('livewire.customer.customer-detail');
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

    public function customerPaymentMade($amountRemaining)
    {
        $this->clearModes();
    }

    public function customerSiPaymentMade()
    {
        $this->exitMode('saleInvoicePaymentCreate');
    }

    public function receiveSaleInvoicePayment($saleInvoiceId)
    {
        $saleInvoice = SaleInvoice::findOrFail($saleInvoiceId);

        $this->paymentReceivingSaleInvoice = $saleInvoice;

        $this->enterMode('saleInvoicePaymentCreate');
    }

    public function exitCustomerPaymentCreateMode()
    {
        $this->exitMode('customerPaymentCreate');
    }

    public function exitSaleInvoicePaymentCreateMode()
    {
        $this->paymentReceivingSaleInvoice = null;
        $this->exitMode('saleInvoicePaymentCreate');
    }

    public function displaySaleInvoice(SaleInvoice $saleInvoice)
    {
        $this->displayingSaleInvoice = $saleInvoice; 

        $this->enterMode('saleInvoiceDisplay');
    }

    public function exitSaleInvoiceDisplayMode()
    {
        $this->exitMode('saleInvoiceDisplay');
        $this->enterMode('salesHistory');
    }

    public function customerCommentCreateCancelled()
    {
        $this->exitMode('customerCommentCreateMode');
    }

    public function customerCommentCreateCompleted()
    {
        $this->exitMode('customerCommentCreateMode');
    }

    public function customerDocumentFileCreateCancelled()
    {
        $this->exitMode('customerDocumentFileCreateMode');
    }

    public function customerDocumentFileCreateCompleted()
    {
        $this->exitMode('customerDocumentFileCreateMode');
    }

    public function educApplicationCreateCancelled()
    {
        $this->exitMode('educApplicationCreateMode');
    }

    public function educApplicationCreateCompleted()
    {
        $this->exitMode('educApplicationCreateMode');
    }
}
