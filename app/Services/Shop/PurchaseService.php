<?php

namespace App\Services\Shop;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Purchase;

class PurchaseService
{
    /**
     * Get paginated list of purchases
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPaginatedPurchases(int $perPage = 5): LengthAwarePaginator
    {
        return Purchase::orderBy('purchase_id', 'DESC')->paginate($perPage);
    }

    /**
     * Create a new purchase
     *
     * @param array $data
     * @return Purchase
     */
    public function createPurchase(array $data): void // Todo
    {
        // Todo
    }

    /**
     * Check if a purchase can be deleted.
     *
     * @param int $purchase_id
     * @return bool
     */
    public function canDeletePurchase(int $purchase_id): bool
    {
        $purchase = Purchase::find($purchase_id);

        // Todo
        return true;
    }

    /**
     * Delete purchase
     *
     * @param int $purchase_id
     * @return void
     */
    public function deletePurchase(int $purchase_id): void
    {
        $purchase = Purchase::find($purchase_id);

        foreach ($purchase->purchasePayments as $purchasePayment) {
            $purchasePayment->delete();
        }

        foreach ($purchase->purchaseAdditions as $purchaseAddition) {
            $purchaseAddition->delete();
        }

        foreach ($purchase->purchaseItems as $purchaseItem) {
            $purchaseItem->delete();
        }

        $purchase->delete();
    }
}
