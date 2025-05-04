<?php

namespace App\Livewire\ProductVendor\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Services\ProductVendorService;
use App\ProductVendor;

/**
 * ProductVendorList Livewire Component
 * 
 * This Livewire component handles the listing of product vendors.
 */
class ProductVendorList extends Component
{
    use WithPagination;

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
}
