<?php

namespace App\Http\Livewire\RecordBook;

use Livewire\Component;

use App\SaleInvoiceAdditionHeading;

use App\Traits\ModesTrait;

class DaybookSaleInvoiceDisplay extends Component
{
    use ModesTrait;

    public $saleInvoice;

    public $has_vat;

    public $modes = [
        'showPayments' => false,
    ];

    public function mount()
    {
        $this->has_vat = $this->hasVat();
    }

    public function render()
    {
        return view('livewire.record-book.daybook-sale-invoice-display');
    }

    public function hasVat()
    {
        if (SaleInvoiceAdditionHeading::where('name', 'vat')->first()) {
            return true;
        } else {
            return false;
        }
    }
}
