<?php

namespace App\Livewire\SaleInvoice\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Traits\ModesTrait;
use App\Services\Shop\SaleInvoiceService;
use App\SaleInvoice;
use App\SaleInvoiceAdditionHeading;

/**
 * SaleInvoiceList Component
 * 
 * This Livewire component handles the listing of sale invoices.
 * It also handles deletion of sale invoices.
 */
class SaleInvoiceList extends Component
{
    use WithPagination;
    use ModesTrait;

    /**
     * Sale invoices per pagination
     *
     * @var int
     */
    public $perPage = 5;

    /**
     * Total count of sale invoices
     *
     * @var int
     */
    public $totalSaleInvoiceCount;

    /**
     * Total count of sale invoices created today
     *
     * @var int
     */
    public $todaySaleInvoiceCount;

    /**
     * Vat is supported or not
     *
     * @var bool
     */
    public $hasVat;

    /* Use bootstrap pagination theme */
    protected $paginationTheme = 'bootstrap';

    /**
     * Sale invoice which needs to be deleted
     *
     * @var SaleInvoice
     */
    public $deletingSaleInvoice;

    /**
     * Component display modes
     *
     * @var array
     */
    public $modes = [
        'showOnlyPendingMode' => false,
        'showOnlyPartiallyPaidMode' => false,
        'showOnlyPaidMode' => false,
        'showAllMode' => true,

        'confirmDelete' => false, 
        'cannotDelete' => false, 
    ];

    /**
     * Render the component
     *
     * @return \Illuminate\View\View
     */
    public function render(): View
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

        return view('livewire.sale-invoice.dashboard.sale-invoice-list')
            ->with('saleInvoices', $saleInvoices);
    }

    /**
     * Confirm if user really wants to delete a sale invoice
     *
     * @return void
     */
    public function confirmDeleteSaleInvoice(int $sale_invoice_id, SaleInvoiceService $saleInvoiceService): void
    {
        $this->deletingSaleInvoice = SaleInvoice::find($sale_invoice_id);

        if ($saleInvoiceService->canDeleteSaleInvoice($sale_invoice_id)) {
            $this->enterModeSilent('confirmDelete');
        } else {
            $this->enterModeSilent('cannotDelete');
        }
    }

    /**
     * Cancel product sale invoice
     *
     * @return void
     */
    public function cancelDeleteSaleInvoice(): void
    {
        $this->deletingSaleInvoice = null;
        $this->exitMode('confirmDelete');
    }

    /**
     * Turn off the mode that shows that a sale invoice cannot be deleted
     *
     * @return void
     */
    public function cancelCannotDeleteSaleInvoice(): void
    {
        $this->deletingSaleInvoice = null;
        $this->exitMode('cannotDelete');
    }

    /**
     * Delete sale invoice
     *
     * @return void
     */
    public function deleteSaleInvoice(SaleInvoiceService $saleInvoiceService): void
    {
        $saleInvoiceService->deleteSaleInvoice($this->deletingSaleInvoice->sale_invoice_id);
        $this->deletingSaleInvoice = null;
        $this->exitMode('confirmDelete');
    }
}
