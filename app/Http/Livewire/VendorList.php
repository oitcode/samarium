<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Vendor;

class VendorList extends Component
{
    public $vendors;

    public function render()
    {
        $this->vendors = Vendor::all();

        return view('livewire.vendor-list');
    }
}
