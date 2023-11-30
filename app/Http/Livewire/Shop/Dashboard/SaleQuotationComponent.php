<?php

namespace App\Http\Livewire\Shop\Dashboard;

use Livewire\Component;

use App\Traits\ModesTrait;

class SaleQuotationComponent extends Component
{
    use ModesTrait;

    public $modes = [
        'createSaleQuotationMode' => false,
        'listSaleQuotationMode' => false,
    ];

    public function render()
    {
        return view('livewire.shop.dashboard.sale-quotation-component');
    }
}
