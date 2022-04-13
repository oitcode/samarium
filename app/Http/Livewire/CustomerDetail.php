<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\SaleInvoice;

class CustomerDetail extends Component
{
    public $customer;

    public $paymentReceivingSaleInvoice;

    public $modes = [
        'salesHistory' => false,
        'customerPaymentCreate' => false,
        'saleInvoicePaymentCreate' => false,
        'ledger' => false,
    ];

    protected $listeners = [
        'customerPaymentMade',
        'receiveSaleInvoicePayment',
        'exitCustomerPaymentCreateMode',
        'exitSaleInvoicePaymentCreateMode',
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
}
