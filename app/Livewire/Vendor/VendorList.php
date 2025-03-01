<?php

namespace App\Livewire\Vendor;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Vendor;

class VendorList extends Component
{
    use WithPagination;

    // public $vendors;
    public $totalVendorCount;

    public function render(): View
    {
        $vendors = Vendor::orderBy('vendor_id', 'DESC')->paginate(5);
        $this->totalVendorCount = Vendor::count();

        return view('livewire.vendor.vendor-list')
            ->with('vendors', $vendors);
    }
}
