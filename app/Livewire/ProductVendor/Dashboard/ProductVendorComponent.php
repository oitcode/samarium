<?php

namespace App\Livewire\ProductVendor\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
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
        'search' => false,
    ];

    protected $listeners = [
        'productVendorCreateCompleted',
        'productVendorCreateCancelled',
        'displayProductVendor',
        'exitProductVendorDisplay',
    ];

    public function render(): View
    {
        return view('livewire.product-vendor.dashboard.product-vendor-component');
    }

    public function productVendorCreateCompleted(): void
    {
        $this->exitMode('create');
    }

    public function productVendorCreateCancelled(): void
    {
        $this->exitMode('create');
    }

    public function displayProductVendor(int $productVendorId): void
    {
        $this->displayingProductVendor = ProductVendor::find($productVendorId);
        $this->enterMode('display');
    }

    public function exitProductVendorDisplay(): void
    {
        $this->displayingProductVendor = null;
        $this->exitMode('display');
    }
}
