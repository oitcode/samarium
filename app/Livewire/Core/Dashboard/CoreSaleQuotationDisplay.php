<?php

namespace App\Livewire\Core\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\TaxTrait;
use App\Models\Company\Company;
use App\Models\SaleInvoice\SaleInvoiceAdditionHeading;

class CoreSaleQuotationDisplay extends Component
{
    use TaxTrait;

    public $saleQuotation;

    public $company;

    public $has_vat;
    public $display_toolbar = true;

    public function render(): View
    {
        $this->company = Company::first();

        $this->has_vat = $this->hasVat();

        return view('livewire.core.dashboard.core-sale-quotation-display');
    }
}
