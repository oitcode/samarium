<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use App\Services\ProductService;
use App\Product;

class ProductSearch extends Component
{
    use ModesTrait;

    public $product_search_name;

    public $products;
    public $searchDone = false;
    public $deletingProduct;

    public $modes = [
        'confirmDelete' => false,
        'cannotDelete' => false,
    ];

    public function render(): View
    {
        return view('livewire.product.dashboard.product-search');
    }

    public function search(): void
    {
        $validatedData = $this->validate([
            'product_search_name' => 'required',
        ]);

        $products = Product::where('name', 'like', '%'.$validatedData['product_search_name'].'%')->get();

        $this->products = $products;
        $this->searchDone = true;
    }

    public function confirmDeleteProduct(int $product_id, ProductService $productService): void
    {
        $this->deletingProduct = Product::find($product_id);

        if ($productService->canDeleteProduct($product_id)) {
            $this->enterMode('confirmDelete');
        } else {
            $this->enterMode('cannotDelete');
        }
    }

    public function cancelDeleteProduct(): void
    {
        $this->deletingProduct = null;
        $this->exitMode('confirmDelete');
    }

    public function cancelCannotDeleteProduct(): void
    {
        $this->deletingProduct = null;
        $this->exitMode('cannotDelete');
    }

    public function deleteProduct(ProductService $productService): void
    {
        $productService->deleteProduct($this->deletingProduct->product_id);
        $this->deletingProduct = null;
        $this->exitMode('confirmDelete');
        $this->search();
    }
}
