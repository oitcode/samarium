<?php

namespace App\Livewire\Sale;

use Livewire\Component;
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
    ];

    public function render()
    {
        return view('livewire.sale.sale-invoice-component');
    }

    public function displaySaleInvoice($saleInvoiceId)
    {
        $saleInvoice = SaleInvoice::find($saleInvoiceId);

        $this->displayingSaleInvoice = $saleInvoice;
        $this->enterMode('display');
    }

    public function exitSaleInvoiceWork()
    {
        $this->displayingSaleInvoice = null;

        $this->exitMode('create');
        $this->exitMode('display');
    }

    public function exitSaleInvoiceWorkMode()
    {
        $this->displayingSaleInvoice = null;
        $this->clearModes();
    }
}
