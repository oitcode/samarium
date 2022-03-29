<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\SaleInvoice;
use App\SaleInvoicePayment;
use App\SaleInvoicePaymentType;

class CustomerPaymentCreate extends Component
{
    public $customer;
    public $saleInvoicePaymentTypes;

    public $payment_date;
    public $pay_amount;
    public $deposited_by;
    public $sale_invoice_payment_type_id;

    public function render()
    {
        $this->payment_date = date('Y-m-d');
        $this->saleInvoicePaymentTypes = SaleInvoicePaymentType::all();

        return view('livewire.customer-payment-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'pay_amount' => 'required|integer',
            'deposited_by' => 'nullable',
            'sale_invoice_payment_type_id' => 'required|integer',
        ]);

        $amountRemaining = $this->pay_amount;

        /* Check if pending sale invoice to pay */
        foreach ($this->customer->getPendingSaleInvoices() as $saleInvoice) {
            /* Stop if no amount remaining. */
            if ($amountRemaining <= 0) {
                break;
            }

            $amountRemaining = $this->receiveSaleInvoicePayment($saleInvoice, $amountRemaining, $this->deposited_by);
        }

        /* TODO */
        /* If amount still remaining ask to return or keep the balance */

        $this->emitUp('customerPaymentMade', $amountRemaining);
    }

    public function receiveSaleInvoicePayment($saleInvoice, $amountAvailable, $depositedBy)
    {
        $retval = 0;

        $saleInvoicePayment = new saleInvoicePayment;

        $saleInvoicePayment->sale_invoice_id = $saleInvoice->sale_invoice_id;
        $saleInvoicePayment->payment_date = $this->payment_date;
        $saleInvoicePayment->deposited_by = $this->deposited_by;

        /* If amount available is not enough for full payment. */
        if ($amountAvailable < $saleInvoice->getPendingAmount()) {
            $saleInvoicePayment->amount = $amountAvailable;
            $saleInvoice->payment_status = 'partially_paid';
        } else {
            /* Enough amount available. */
            $saleInvoicePayment->amount = $saleInvoice->getPendingAmount();
            $saleInvoice->payment_status = 'paid';

            $retval = $amountAvailable - $saleInvoice->getPendingAmount();
        }

        $saleInvoicePayment->save();
        $saleInvoice->save();

        return $retval;
    }
}
