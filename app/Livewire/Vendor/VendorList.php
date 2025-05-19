<?php

namespace App\Livewire\Vendor;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Traits\ModesTrait;
use App\Services\Shop\VendorService;
use App\Vendor;

/**
 * VendorList Component
 * 
 * This Livewire component handles the listing of vendors.
 * It also handles deletion of vendors.
 */
class VendorList extends Component
{
    use ModesTrait;
    use WithPagination;

    /**
     * Vendors per pagination
     *
     * @var int
     */
    public $perPage = 5;

    /**
     * Total count of vendors
     *
     * @var int
     */
    public $totalVendorCount;

    /**
     * Vendor which needs to be deleted
     *
     * @var Vendor
     */
    public $deletingVendor = null;

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
    public function render(VendorService $vendorService): View
    {
        $vendors = $vendorService->getPaginatedVendors($this->perPage);
        $this->totalVendorCount = $vendorService->getTotalVendorCount();

        return view('livewire.vendor.vendor-list', [
            'vendors' => $vendors,
        ]);
    }

    /**
     * Confirm if user really wants to delete a vendor
     *
     * @return void
     */
    public function confirmDeleteVendor(int $vendor_id, VendorService $vendorService): void
    {
        $this->deletingVendor = Vendor::find($vendor_id);

        if ($vendorService->canDeleteVendor($vendor_id)) {
            $this->enterMode('confirmDelete');
        } else {
            $this->enterMode('cannotDelete');
        }
    }

    /**
     * Cancel vendor delete
     *
     * @return void
     */
    public function cancelDeleteVendor(): void
    {
        $this->deletingVendor = null;
        $this->exitMode('confirmDelete');
    }

    /**
     * Turn off the mode that shows that a vendor cannot be deleted
     *
     * @return void
     */
    public function cancelCannotDeleteVendor(): void
    {
        $this->deletingVendor = null;
        $this->exitMode('cannotDelete');
    }

    /**
     * Delete vendor
     *
     * @return void
     */
    public function deleteVendor(VendorService $vendorService): void
    {
        $vendorService->deleteVendor($this->deletingVendor->vendor_id);
        $this->deletingVendor = null;
        $this->exitMode('confirmDelete');
    }
}
