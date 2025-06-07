<?php

namespace App\Services\Shop;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Vendor\Vendor;

class VendorService
{
    /**
     * Get paginated list of vendors
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPaginatedVendors(int $perPage = 5): LengthAwarePaginator
    {
        return Vendor::orderBy('vendor_id', 'DESC')->paginate($perPage);
    }

    /**
     * Create a new vendor
     *
     * @param array $data
     * @return Vendor
     */
    public function createVendor(array $data): void // Todo
    {
        // Todo
    }

    /**
     * Check if a vendor can be deleted.
     *
     * @param int $vendor_id
     * @return bool
     */
    public function canDeleteVendor(int $vendor_id): bool
    {
        $vendor = Vendor::find($vendor_id);

        if (count($vendor->purchases) > 0 || count($vendor->expenses) > 0) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Delete vendor
     *
     * @param int $vendor_id
     * @return void
     */
    public function deleteVendor(int $vendor_id): void
    {
        $vendor = Vendor::find($vendor_id);

        // Todo: Delete vendor related rows from other tables

        $vendor->delete();
    }

    /**
     * Get total vendor count
     *
     * @return int
     */
    public function getTotalVendorCount(): int
    {
        return Vendor::count();
    }
}
