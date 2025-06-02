<?php

namespace App\Livewire\SaleInvoice\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use App\SaleInvoice;

class SaleInvoiceComponent extends Component
{
    use ModesTrait;

    public $displayingSaleInvoice = null;

    public $modes = [
        'create' => false,
        'list' => true,
        'display' => false,
        'search' => false,
    ];

    protected $listeners = [
        'displaySaleInvoice',
        'exitSaleInvoiceWork',

        'exitSaleInvoiceWorkMode',
        'exitSaleInvoiceDisplay',
    ];

    public function render(): View
    {
        return view('livewire.sale-invoice.dashboard.sale-invoice-component');
    }

    public function displaySaleInvoice($saleInvoiceId): void
    {
        $saleInvoice = SaleInvoice::find($saleInvoiceId);

        $this->displayingSaleInvoice = $saleInvoice;
        $this->enterMode('display');
    }

    public function exitSaleInvoiceWork(): void
    {
        $this->displayingSaleInvoice = null;

        $this->exitMode('create');
        $this->exitMode('display');
    }

    public function exitSaleInvoiceWorkMode(): void
    {
        $this->displayingSaleInvoice = null;
        $this->clearModes();
    }

    public function exitSaleInvoiceDisplay(): void
    {
        $this->displayingSaleInvoice = null;
        $this->clearModes();
    }
}
