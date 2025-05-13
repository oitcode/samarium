<?php

namespace App\Services\Shop;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use App\SaleInvoice;

class SaleInvoiceService
{
    /**
     * Get paginated list of sale invoices
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPaginatedSaleInvoices(int $perPage = 5): LengthAwarePaginator
    {
        return SaleInvoice::orderBy('sale_invoice_id', 'DESC')->paginate($perPage);
    }

    /**
     * Create a new sale invoice
     *
     * @param array $data
     * @return SaleInvoice
     */
    public function createSaleInvoice(array $data): void // Todo
    {
        // Todo
    }

    /**
     * Check if a sale invoice can be deleted.
     *
     * @param int $sale_invoice_id
     * @return bool
     */
    public function canDeleteSaleInvoice(int $sale_invoice_id): bool
    {
        $saleInvoice = SaleInvoice::find($sale_invoice_id);

        // Todo
        return true;
    }

    /**
     * Delete sale invoice
     *
     * @param int $sale_invoice_id
     * @return void
     */
    public function deleteSaleInvoice(int $sale_invoice_id): void
    {
        $saleInvoice = SaleInvoice::find($sale_invoice_id);

        foreach ($saleInvoice->saleInvoicePayments as $saleInvoicePayment) {
            $saleInvoicePayment->delete();
        }

        foreach ($saleInvoice->saleInvoiceAdditions as $saleInvoiceAddition) {
            $saleInvoiceAddition->delete();
        }

        foreach ($saleInvoice->saleInvoiceItems as $saleInvoiceItem) {
            $saleInvoiceItem->delete();
        }

        $saleInvoice->delete();
    }
}
