<?php

namespace App\Livewire\Shop\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
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

    public function render(): View
    {
        return view('livewire.shop.dashboard.sale-quotation-component');
    }

    public function displaySaleQuotation($saleQuotationId): void
    {
        $saleQuotation = SaleQuotation::find($saleQuotationId);

        $this->displayingSaleQuotation = $saleQuotation;
        $this->enterMode('displaySaleQuotationMode');
    }

    public function exitSaleQuotationWork(): void
    {
        $this->displayingSaleQuotation = null;

        $this->exitMode('createSaleQuotationMode');
        $this->exitMode('displaySaleQuotationMode');
    }

    public function exitSaleQuotationDisplayMode(): void
    {
        $this->displayingOnlineOrder = null;
        $this->clearModes();
    }
}
