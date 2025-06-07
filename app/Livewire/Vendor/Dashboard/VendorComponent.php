<?php

namespace App\Livewire\Vendor\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use App\Models\Vendor\Vendor;

class VendorComponent extends Component
{
    use ModesTrait;
    
    public $displayingVendor = null;

    public $modes = [
        'create' => false,
        'list' => true,
        'display' => false,
        'update' => false,
        'delete' => false,
        'search' => false,
    ];

    protected $listeners = [
        'clearModes',
        'displayVendor',
        'exitCreateMode',

        'vendorCreated' => 'ackVendorCreated',
        'exitVendorDisplayMode',
    ];

    public function render(): View
    {
        return view('livewire.vendor.dashboard.vendor-component');
    }

    public function exitCreateMode(): void
    {
        $this->exitMode('create');
    }

    public function displayVendor($vendorId): void
    {
        // $this->displayingVendor = $vendor;
        $this->displayingVendor = Vendor::find($vendorId);

        $this->enterMode('display');
    }

    public function ackVendorCreated(): void
    {
        session()->flash('message', 'Vendor created');

        $this->exitMode('create');
    }

    public function exitVendorDisplayMode(): void
    {
        $this->displayingVendor = null;
        $this->clearModes();
    }
}
