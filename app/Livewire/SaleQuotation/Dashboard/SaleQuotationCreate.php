<?php

namespace App\Livewire\SaleQuotation\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\SaleQuotation;

class SaleQuotationCreate extends Component
{
    public function render()
    {
        $saleQuotation = $this->startSaleQuotation();

        return view('livewire.sale-quotation.dashboard.sale-quotation-create')
            ->with('saleQuotation', $saleQuotation);
    }

    public function startSaleQuotation()
    {
        $saleQuotation = new SaleQuotation;

        $saleQuotation->sale_quotation_date = date('Y-m-d');
        $saleQuotation->creation_status = 'progress';

        /* User which created this record. */
        $saleQuotation->creator_id = Auth::user()->id;

        $saleQuotation->save();

        return $saleQuotation;
    }
}
