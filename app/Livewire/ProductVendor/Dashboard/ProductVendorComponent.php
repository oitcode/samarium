<?php

namespace App\Livewire\ProductVendor\Dashboard;

use Livewire\Component;
use App\Traits\ModesTrait;
use App\ProductVendor;

class ProductVendorComponent extends Component
{
    use ModesTrait;

    public $displayingProductVendor;

    public $modes = [
        'create' => false,
        'list' => false,
        'display' => false,
        'delete' => false,
    ];

    protected $listeners = [
        'productVendorCreateCompleted',
        'productVendorCreateCancelled',
        'displayProductVendor',
        'exitProductVendorDisplay',
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

    public function displayProductVendor(ProductVendor $productVendor)
    {
        $this->displayingProductVendor = $productVendor;
        $this->enterMode('display');
    }

    public function exitProductVendorDisplay()
    {
        $this->displayingProductVendor = null;
        $this->exitMode('display');
    }
}
