<?php

namespace App\Livewire\Vendor;

use Livewire\Component;
use Illuminate\View\View;
use App\Vendor;

class VendorSearch extends Component
{
    public $vendor_search_name;

    public $vendors;
    public $searchDone;

    public function render(): View
    {
        return view('livewire.vendor.vendor-search');
    }

    public function search(): void
    {
        $validatedData = $this->validate([
            'vendor_search_name' => 'required',
        ]);

        $vendors = Vendor::where('name', 'like', '%'.$validatedData['vendor_search_name'].'%')->get();

        $this->vendors = $vendors;

        $this->searchDone = true;
    }
}
