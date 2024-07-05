<?php

namespace App\Http\Livewire\Vendor;

use Livewire\Component;

use App\Vendor;

class VendorComponent extends Component
{
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

    public function render()
    {
        return view('livewire.vendor.vendor-component');
    }

    /* Clear modes */
    public function clearModes()
    {
        foreach ($this->modes as $key => $val) {
            $this->modes[$key] = false;
        }
    }

    /* Enter and exit mode */
    public function enterMode($modeName)
    {
        $this->clearModes();

        $this->modes[$modeName] = true;
    }

    public function exitMode($modeName)
    {
        $this->modes[$modeName] = false;
    }

    public function exitCreateMode()
    {
        $this->exitMode('create');
    }

    public function displayVendor(Vendor $vendor)
    {
        $this->displayingVendor = $vendor;

        $this->enterMode('display');
    }

    public function ackVendorCreated()
    {
        session()->flash('message', 'Vendor created');

        $this->exitMode('create');
    }

    public function exitVendorDisplayMode()
    {
        $this->displayingVendor = null;
        $this->clearModes();
    }
}
