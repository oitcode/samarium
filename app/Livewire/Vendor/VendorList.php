<?php

namespace App\Livewire\Vendor;

use Livewire\Component;
use Livewire\WithPagination;

use App\Vendor;

class VendorList extends Component
{
    use WithPagination;

    // public $vendors;

    public function render()
    {
        $vendors = Vendor::orderBy('vendor_id', 'DESC')->paginate(5);

        return view('livewire.vendor.vendor-list')
            ->with('vendors', $vendors);
    }
}
