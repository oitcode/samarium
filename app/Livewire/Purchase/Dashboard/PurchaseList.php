<?php

namespace App\Livewire\Purchase\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use App\Traits\ModesTrait;
use App\Services\Shop\PurchaseService;
use App\Models\Purchase\Purchase;

/**
 * PurchaseList Component
 * 
 * This Livewire component handles the listing of purchases.
 * It also handles deletion of purchases.
 */
class PurchaseList extends Component
{
    use ModesTrait;
    use WithPagination;

    /**
     * Purchases per pagination
     *
     * @var int
     */
    public $perPage = 5;

    /**
     * Total count of purchases
     *
     * @var int
     */
    public $totalPurchaseCount;

    /**
     * Purchase which needs to be deleted
     *
     * @var Purchase
     */
    public $deletingPurchase = null;

    /**
     * Component display modes
     *
     * @var array
     */
    public $modes = [
        'confirmDelete' => false, 
        'cannotDelete' => false, 
    ];

    /**
     * Render the component
     *
     * @return \Illuminate\View\View
     */
    public function render(PurchaseService $purchaseService): View
    {
        $this->totalPurchaseCount = Purchase::count();
        $purchases = $purchaseService->getPaginatedPurchases($this->perPage);

        return view('livewire.purchase.dashboard.purchase-list', [
            'purchases' => $purchases,
        ]);
    }

    /**
     * Confirm if user really wants to delete a purchase
     *
     * @return void
     */
    public function confirmDeletePurchase(int $purchase_id, PurchaseService $purchaseService): void
    {
        $this->deletingPurchase = Purchase::find($purchase_id);

        if ($purchaseService->canDeletePurchase($purchase_id)) {
            $this->enterMode('confirmDelete');
        } else {
            $this->enterMode('cannotDelete');
        }
    }

    /**
     * Cancel purchase delete
     *
     * @return void
     */
    public function cancelDeletePurchase(): void
    {
        $this->deletingPurchase = null;
        $this->exitMode('confirmDelete');
    }

    /**
     * Turn off the mode that shows that a purchase cannot be deleted
     *
     * @return void
     */
    public function cancelCannotDeletePurchase(): void
    {
        $this->deletingPurchase = null;
        $this->exitMode('cannotDelete');
    }

    /**
     * Delete purchase
     *
     * @return void
     */
    public function deletePurchase(PurchaseService $purchaseService): void
    {
        $purchaseService->deletePurchase($this->deletingPurchase->purchase_id);
        $this->deletingPurchase = null;
        $this->exitMode('confirmDelete');
    }
}
