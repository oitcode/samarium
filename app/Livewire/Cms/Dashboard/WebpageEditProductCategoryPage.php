<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\ProductCategory;
use App\WebpageProductCategory;

class WebpageEditProductCategoryPage extends Component
{
    public $webpage;
    public $productCategories;
    public $product_category_id;

    public function render(): View
    {
        $this->productCategories = ProductCategory::all();

        return view('livewire.cms.dashboard.webpage-edit-product-category-page');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'product_category_id' => 'required',
        ]);

        $validatedData['webpage_id'] = $this->webpage->webpage_id;

        WebpageProductCategory::create($validatedData);

        $this->dispatch('webpageEditProductCategoryCompleted');
    }
}
