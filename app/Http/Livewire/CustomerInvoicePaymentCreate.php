<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\SaleInvoicePayment;
use App\SaleInvoicePaymentType;

class CustomerInvoicePaymentCreate extends Component
{
    public $saleInvoice;

    public $payment_date;
    public $deposited_by;
    public $sale_invoice_payment_type_id;
    public $pay_amount;

    public $saleInvoicePaymentTypes;

    public function render()
    {
        $this->payment_date = date('Y-m-d');
        $this->saleInvoicePaymentTypes = SaleInvoicePaymentType::all();

        return view('livewire.customer-invoice-payment-create');
    }

    public function store()
    {
        $retval = 0;

        $saleInvoicePayment = new saleInvoicePayment;

        $saleInvoicePayment->sale_invoice_id = $this->saleInvoice->sale_invoice_id;
        $saleInvoicePayment->payment_date = $this->payment_date;
        $saleInvoicePayment->deposited_by = $this->deposited_by;
        $saleInvoicePayment->sale_invoice_payment_type_id = $this->sale_invoice_payment_type_id;

        /* If amount available is not enough for full payment. */
        if ($this->pay_amount < $this->saleInvoice->getPendingAmount()) {
            $saleInvoicePayment->amount = $this->pay_amount;
            $this->saleInvoice->payment_status = 'partially_paid';
        } else {
            /* Enough amount available. */
            $saleInvoicePayment->amount = $this->saleInvoice->getPendingAmount();
            $this->saleInvoice->payment_status = 'paid';

            $retval = $this->pay_amount - $this->saleInvoice->getPendingAmount();
        }

        $saleInvoicePayment->save();
        $this->saleInvoice->save();

        $this->emit('clearModes');
    }
}
