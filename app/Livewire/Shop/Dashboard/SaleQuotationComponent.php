<?php

namespace App\Livewire\Shop\Dashboard;

use Livewire\Component;

use App\Traits\ModesTrait;

use App\SaleQuotation;

class SaleQuotationComponent extends Component
{
    use ModesTrait;

    public $displayingSaleQuotation = null;

    public $modes = [
        'createSaleQuotationMode' => false,
        'listSaleQuotationMode' => false,
        'displaySaleQuotationMode' => false,
        'searchSaleQuotationMode' => false,
    ];

    protected $listeners = [
        'displaySaleQuotation',
        'exitSaleQuotationWork',
        'exitSaleQuotationDisplayMode',
    ];

    public function render()
    {
        return view('livewire.shop.dashboard.sale-quotation-component');
    }

    public function displaySaleQuotation($saleQuotationId)
    {
        $saleQuotation = SaleQuotation::find($saleQuotationId);

        $this->displayingSaleQuotation = $saleQuotation;
        $this->enterMode('displaySaleQuotationMode');
    }

    public function exitSaleQuotationWork()
    {
        $this->displayingSaleQuotation = null;

        $this->exitMode('createSaleQuotationMode');
        $this->exitMode('displaySaleQuotationMode');
    }

    public function exitSaleQuotationDisplayMode()
    {
        $this->displayingOnlineOrder = null;
        $this->clearModes();
    }
}
