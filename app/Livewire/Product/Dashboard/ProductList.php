<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Services\ProductService;
use App\Traits\ModesTrait;
use App\Models\Product;

class ProductList extends Component
{
    use WithPagination;
    use ModesTrait;

    // public $products;
    public $totalProductCount; 
    public $deletingProduct; 

    public $modes = [
        'confirmDelete' => false,
        'cannotDelete' => false,
    ];

    public function render(): View
    {
        $products = Product::orderBy('product_id', 'desc')->paginate(5);
        $this->totalProductCount = Product::count();

        return view('livewire.product.dashboard.product-list')
            ->with('products', $products);
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
    }
}
