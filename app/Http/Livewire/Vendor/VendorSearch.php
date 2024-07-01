<?php

namespace App\Http\Livewire\Vendor;

use Livewire\Component;

use App\Vendor;

class VendorSearch extends Component
{
    public $vendor_search_name;

    public $vendors;

    public function render()
    {
        return view('livewire.vendor.vendor-search');
    }

    public function search()
    {
        $validatedData = $this->validate([
            'vendor_search_name' => 'required',
        ]);

        $vendors = Vendor::where('name', 'like', '%'.$validatedData['vendor_search_name'].'%')->get();

        $this->vendors = $vendors;
    }
}
