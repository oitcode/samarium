<?php

namespace App\Livewire\RecordBook\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
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

    public function mount(): void
    {
        $this->has_vat = SaleInvoiceAdditionHeading::where('name', 'vat')->exists();
    }

    public function render(): View
    {
        return view('livewire.record-book.dashboard.daybook-sale-invoice-display');
    }
}
