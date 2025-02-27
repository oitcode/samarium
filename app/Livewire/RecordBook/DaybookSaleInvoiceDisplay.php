<?php

namespace App\Livewire\RecordBook;

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
        $this->has_vat = SaleInvoiceAdditionHeading::where('name', 'vat')->exists();
    }

    public function render()
    {
        return view('livewire.record-book.daybook-sale-invoice-display');
    }
}
