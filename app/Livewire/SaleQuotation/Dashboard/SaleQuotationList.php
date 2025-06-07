<?php

namespace App\Livewire\SaleQuotation\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Traits\ModesTrait;
use App\Models\SaleQuotation\SaleQuotation;
use App\Models\SaleInvoice\SaleInvoiceAdditionHeading;

class SaleQuotationList extends Component
{
    use WithPagination;
    use ModesTrait;

    public $deletingSaleQuotation = null;

    public $todaySaleQuotationCount;
    public $totalSaleQuotationCount;
    public $hasVat;
     
    /* Use bootstrap pagination theme */
    protected $paginationTheme = 'bootstrap';

    public $modes = [
        'confirmDelete' => false,
    ];

    protected $listeners = [
        'exitConfirmSaleQuotationDelete',
        'saleQuotationDeleted' => 'ackSaleQuotationDeleted',
    ];

    public function render(): View
    {
        $saleQuotations = SaleQuotation::orderBy('sale_quotation_id', 'desc')->paginate(5);
        $this->totalSaleQuotationCount = SaleQuotation::count();
        $this->todaySaleQuotationCount = SaleQuotation::whereDate('created_at', date('Y-m-d'))->count();

        $this->hasVat = SaleInvoiceAdditionHeading::where('name', 'vat')->exists();

        return view('livewire.sale-quotation.dashboard.sale-quotation-list')
            ->with('saleQuotations', $saleQuotations);
    }

    public function confirmDeleteSaleQuotation(SaleQuotation $saleQuotation): void
    {
        $this->deletingSaleQuotation = $saleQuotation;

        $this->enterMode('confirmDelete');
    }

    public function exitConfirmSaleQuotationDelete(): void
    {
        $this->deletingSaleQuotation = null;
        $this->exitMode('confirmDelete');
    }

    public function ackSaleQuotationDeleted(): void
    {
        $this->deletingSaleQuotation = null;
        $this->exitMode('confirmDelete');

        $this->render();
    }
}
