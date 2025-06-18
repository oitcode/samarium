<?php

namespace App\Livewire\ProductCategory\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use App\Models\Product\ProductCategory;

class ProductCategoryComponent extends Component
{
    use ModesTrait;

    public $displayingProductCategory;

    public $modes = [
        'create' => false,
        'list' => true,
        'display' => false,
        'delete' => false,
        'search' => false,
    ];

    protected $listeners = [
        'productCategoryCreateCompleted',
        'productCategoryCreateCancelled',
        'displayProductCategory',
        'productCategoryDisplayCancelled',
        'exitProductCategoryDisplayMode',
    ];

    public function render(): View
    {
        return view('livewire.product-category.dashboard.product-category-component');
    }

    public function productCategoryCreateCancelled(): void
    {
        $this->exitMode('create');
    }

    public function productCategoryCreateCompleted(): void
    {
        session()->flash('message', 'Product category created.');
        $this->exitMode('create');
    }

    public function displayProductCategory(int $productCategoryId): void
    {
        $this->displayingProductCategory = ProductCategory::find($productCategoryId);

        $this->enterMode('display');
    }

    public function productCategoryDisplayCancelled(): void
    {
        $this->displayingProductCategory = null;

        $this->exitMode('display');
    }

    public function exitProductCategoryDisplayMode(): void
    {
        $this->productCategoryDisplayCancelled();
    }
}
