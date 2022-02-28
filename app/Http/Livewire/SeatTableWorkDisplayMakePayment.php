<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Customer;
use App\SaleInvoice;
use App\SaleInvoicePayment;

class SeatTableWorkDisplayMakePayment extends Component
{
    public $seatTable;

    public $total;
    public $pay_by;
    public $tender_amount;

    public $returnAmount;

    /* Customer to which sale_invoice will be made */
    public $customer;

    /* Customer info */
    public $customer_name;
    public $customer_phone;
    public $customer_address;
    public $customer_pan;

    public $modes = [
        'paid' => false,
    ];

    public function mount()
    {
        $this->total = $this->seatTable->getCurrentBookingTotalAmount();
    }
    public function render()
    {
        return view('livewire.seat-table-work-display-make-payment');
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

    public function store()
    {
        $validatedData = $this->validate([
            'tender_amount' => 'required|integer',

            'customer_name' => 'nullable',
            'customer_phone' => 'nullable',
            'customer_address' => 'nullable',
            'customer_pan' => 'nullable',
        ]);

        $currentBookingAmount = $this->seatTable->getCurrentBookingTotalAmount();

        if ($this->tender_amount < $currentBookingAmount) {
            return;
        }

        /*
         *
         * Todo: Make payment against an invoice
         *
         */

        /* Get the sale_invoice */
        $saleInvoice = $this->seatTable->getCurrentBooking()->saleInvoice;

        /* Make sale_invoice_payment */
        $saleInvoicePayment = new SaleInvoicePayment;

        $saleInvoicePayment->payment_date = date('Y-m-d');
        $saleInvoicePayment->sale_invoice_id = $saleInvoice->sale_invoice_id;
        $saleInvoicePayment->amount = $currentBookingAmount;

        $saleInvoicePayment->save();

        /* Mark sale_invoice as paid  */
        $saleInvoice->payment_status = 'paid';
        $saleInvoice->save();

        $this->returnAmount = $this->tender_amount - $currentBookingAmount;

        $this->enterMode('paid');

    }

    public function finishPayment()
    {
        $booking = $this->seatTable->getCurrentBooking();
        $booking->status = 'closed';
        $booking->save();

        $this->emit('exitMakePaymentMode');
    }

    public function fetchCustomerData()
    {
        $customer = Customer::where('phone', $this->customer_phone)->first();

        if ($customer) {
            $this->customer = $customer;

            $this->customer_name = $customer->name;
            $this->customer_address = $customer->address;
        }
    }
}
