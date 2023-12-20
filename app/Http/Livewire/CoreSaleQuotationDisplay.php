<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Traits\ModesTrait;

use App\Company;
use App\SaleInvoiceAdditionHeading;

class CoreSaleQuotationDisplay extends Component
{
    use ModesTrait;

    public $saleQuotation;

    public $company;

    public $has_vat;
    public $display_toolbar = true;

    public $modes = [
        'showPayments' => false,
    ];

    public function render()
    {
        $this->company = Company::first();

        $this->has_vat = $this->hasVat();

        return view('livewire.core-sale-quotation-display');
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
