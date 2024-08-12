<?php

namespace App\Livewire\SaleQuotation\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;

use App\Traits\ModesTrait;

use App\SaleQuotation;

class SaleQuotationList extends Component
{
    use WithPagination;
    use ModesTrait;

    public $deletingSaleQuotation = null;

    public $todaySaleQuotationCount;
    public $totalSaleQuotationCount;
     
    /* Use bootstrap pagination theme */
    protected $paginationTheme = 'bootstrap';

    public $modes = [
        'confirmDelete' => false,
    ];

    protected $listeners = [
        'exitConfirmSaleQuotationDelete',
        'saleQuotationDeleted' => 'ackSaleQuotationDeleted',
    ];

    public function render()
    {
        $saleQuotations = SaleQuotation::orderBy('sale_quotation_id', 'desc')->paginate(5);
        $this->totalSaleQuotationCount = SaleQuotation::count();
        $this->todaySaleQuotationCount = SaleQuotation::whereDate('created_at', date('Y-m-d'))->count();

        return view('livewire.sale-quotation.dashboard.sale-quotation-list')
            ->with('saleQuotations', $saleQuotations);
    }

    public function confirmDeleteSaleQuotation(SaleQuotation $saleQuotation)
    {
        $this->deletingSaleQuotation = $saleQuotation;

        $this->enterMode('confirmDelete');
    }

    public function exitConfirmSaleQuotationDelete()
    {
        $this->deletingSaleQuotation = null;
        $this->exitMode('confirmDelete');
    }

    public function ackSaleQuotationDeleted()
    {
        $this->deletingSaleQuotation = null;
        $this->exitMode('confirmDelete');

        $this->render();
    }
}
