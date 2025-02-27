<?php

namespace App\Livewire\Sale;

use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\ModesTrait;
use App\SaleInvoice;
use App\SaleInvoiceAdditionHeading;

class SaleInvoiceList extends Component
{
    use WithPagination;
    use ModesTrait;

    public $todaySaleInvoiceCount;
    public $totalSaleInvoiceCount;
    public $hasVat;

    /* Use bootstrap pagination theme */
    protected $paginationTheme = 'bootstrap';

    // public $saleInvoices;

    public $modes = [
        'confirmDelete' => false,

        'showOnlyPendingMode' => false,
        'showOnlyPartiallyPaidMode' => false,
        'showOnlyPaidMode' => false,
        'showAllMode' => true,

        'delete' => false, 
        'cannotDelete' => false, 
    ];

    protected $listeners = [
        'exitConfirmSaleInvoiceDelete',
        'saleInvoiceDeleted' => 'ackSaleInvoiceDeleted',
    ];

    public function render()
    {
        $this->hasVat = SaleInvoiceAdditionHeading::where('name', 'vat')->exists();

        if ($this->modes['showAllMode']) {
            $saleInvoices = SaleInvoice::orderBy('sale_invoice_id', 'desc');
        } else if ($this->modes['showOnlyPendingMode']) {
            $saleInvoices = SaleInvoice::where('payment_status', 'pending')->orderBy('sale_invoice_id', 'desc');
        } else if ($this->modes['showOnlyPartiallyPaidMode']) {
            $saleInvoices = SaleInvoice::where('payment_status', 'partially_paid')->orderBy('sale_invoice_id', 'desc');
        } else if ($this->modes['showOnlyPaidMode']) {
            $saleInvoices = SaleInvoice::where('payment_status', 'paid')->orderBy('sale_invoice_id', 'desc');
        } else {
            // Todo
        }

        $this->totalSaleInvoiceCount = $saleInvoices->count();
        $this->todaySaleInvoiceCount = SaleInvoice::whereDate('created_at', date('Y-m-d'))->count();

        $saleInvoices  = $saleInvoices->paginate(5);

        return view('livewire.sale.sale-invoice-list')
            ->with('saleInvoices', $saleInvoices);
    }

    public function confirmDeleteSaleInvoice(SaleInvoice $saleInvoice)
    {
        $this->deletingSaleInvoice= $saleInvoice;

        $this->enterMode('confirmDelete');
    }

    public function exitConfirmSaleInvoiceDelete()
    {
        $this->deletingSaleInvoice = null;
        $this->exitMode('confirmDelete');
    }

    public function ackSaleInvoiceDeleted()
    {
        $this->deletingSaleInvoice = null;
        $this->exitMode('confirmDelete');

        $this->render();
    }
}
