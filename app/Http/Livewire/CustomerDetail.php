<?php

namespace App\Http\Livewire;

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
    ];

    protected $listeners = [
        'customerPaymentMade',
        'receiveSaleInvoicePayment',
        'exitCustomerPaymentCreateMode',
        'exitSaleInvoicePaymentCreateMode',
        'customerSiPaymentMade',
        'displaySaleInvoice',
        'exitSaleInvoiceDisplayMode',
    ];


    public function render()
    {
        return view('livewire.customer-detail');
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
}
