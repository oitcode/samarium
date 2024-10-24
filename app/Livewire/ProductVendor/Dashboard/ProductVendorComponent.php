<?php

namespace App\Livewire\ProductVendor\Dashboard;

use Livewire\Component;

use App\Traits\ModesTrait;

class ProductVendorComponent extends Component
{
    use ModesTrait;

    public $modes = [
        'create' => false,
        'list' => false,
        'display' => false,
        'delete' => false,
    ];

    protected $listeners = [
        'productVendorCreateCompleted',
        'productVendorCreateCancelled',
    ];

    public function render()
    {
        return view('livewire.product-vendor.dashboard.product-vendor-component');
    }

    public function productVendorCreateCompleted()
    {
        $this->exitMode('create');
    }

    public function productVendorCreateCancelled()
    {
        $this->exitMode('create');
    }
}
