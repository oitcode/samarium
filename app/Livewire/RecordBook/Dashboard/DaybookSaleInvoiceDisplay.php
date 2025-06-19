<?php

namespace App\Livewire\RecordBook\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\SaleInvoiceAdditionHeading;
use App\Traits\ModesTrait;
use App\Traits\TaxTrait;

class DaybookSaleInvoiceDisplay extends Component
{
    use ModesTrait;
    use TaxTrait;

    public $saleInvoice;

    public $has_vat;

    public $modes = [
        'showPayments' => false,
    ];

    public function mount(): void
    {
        $this->has_vat = $this->hasVat();
    }

    public function render(): View
    {
        return view('livewire.record-book.dashboard.daybook-sale-invoice-display');
    }
}
