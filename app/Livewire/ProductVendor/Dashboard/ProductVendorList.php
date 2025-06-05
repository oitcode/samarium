<?php

namespace App\Livewire\ProductVendor\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Traits\ModesTrait;
use App\Services\ProductVendorService;
use App\Models\ProductVendor;

/**
 * ProductVendorList Livewire Component
 * 
 * This Livewire component handles the listing of product vendors.
 */
class ProductVendorList extends Component
{
    use ModesTrait;
    use WithPagination;

    /**
     * Product vendor which needs to be deleted
     *
     * @var ProductQuestion
     */
    public $deletingProductVendor;

    /**
     * Component modes
     *
     * @var array
     */
    public $modes = [
        'confirmDelete' => false,
        'cannotDelete' => false,
    ];

    /**
     * Total count of product vendors
     *
     * @var int
     */
    public $totalProductVendorCount;

    /**
     * Render the component
     *
     * @return \Illuminate\View\View
     */
    public function render(ProductVendorService $productVendorService): View
    {
        $productVendors = $productVendorService->getPaginatedProductVendors(5);
        $this->totalProductVendorCount = $productVendorService->getTotalProductVendorCount();

        return view('livewire.product-vendor.dashboard.product-vendor-list', [
            'productVendors' => $productVendors,
        ]);
    }

    /**
     * Confirm if user really wants to delete a product vendor
     *
     * @return void
     */
    public function confirmDeleteProductVendor(int $product_vendor_id, ProductVendorService $productVendorService): void
    {
        $this->deletingProductVendor = ProductVendor::find($product_vendor_id);

        if ($productVendorService->canDeleteProductVendor($product_vendor_id)) {
            $this->enterMode('confirmDelete');
        } else {
            $this->enterMode('cannotDelete');
        }
    }

    /**
     * Cancel product vendor delete
     *
     * @return void
     */
    public function cancelDeleteProductVendor(): void
    {
        $this->deletingProductVendor = null;
        $this->exitMode('confirmDelete');
    }

    /**
     * Turn off the mode that shows that a product cannot be deleted
     *
     * @return void
     */
    public function cancelCannotDeleteProductVendor(): void
    {
        $this->deletingProductVendor = null;
        $this->exitMode('cannotDelete');
    }

    /**
     * Delete product vendor
     *
     * @return void
     */
    public function deleteProductVendor(ProductVendorService $productVendorService): void
    {
        $productVendorService->deleteProductVendor($this->deletingProductVendor->product_vendor_id);
        $this->deletingProductVendor = null;
        $this->exitMode('confirmDelete');
    }
}
