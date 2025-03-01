<?php

namespace App\Livewire\SaleQuotation\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use App\Product;
use App\ProductCategory;
use App\SaleQuotationItem;

class SaleQuotationWorkAddItem extends Component
{
    use ModesTrait;

    public $saleQuotation;

    /* Search options */
    public $add_item_name;
    public $search_product_category_id;

    /* Products and Categories */
    public $products;
    public $productCategories;

    public $product_id;
    public $quantity;
    public $price;
    public $total;

    public $selectedProduct = null;

    public $modes = [
        'showMobForm' => false,
    ];

    public function mount(): void
    {
        $this->products = Product::where('name', 'like', '%'.$this->add_item_name.'%')
            ->where('is_base_product', false)
            ->orderBy('name', 'ASC')
            ->get();
    }

    public function render(): View
    {
        $this->productCategories = ProductCategory::where('does_sell', 'yes')
            ->orderBy('name', 'ASC')
            ->get();

        return view('livewire.sale-quotation.dashboard.sale-quotation-work-add-item');
    }

    public function addItemToSaleQuotation(): void
    {
        if (! $this->selectedProduct) {
            return;
        }

        /*
         * If same product added before just increase the count.
         * Else, create a new sale invoice item.
         *
         */

        $saleQuotationItem = $this->checkExistingItemsForProduct($this->saleQuotation, $this->product_id);

        if ($saleQuotationItem) {
            /* Update existing sale invoice item. */
            $saleQuotationItem->quantity += $this->quantity;
            $saleQuotationItem->save();

            $this->updateSaleQuotationTotalAmount($this->saleQuotation, $saleQuotationItem, $this->quantity);
        } else {
            /* Add sale_invoice_item to sale_invoice */
            $saleQuotationItem = new SaleQuotationItem;

            $saleQuotationItem->sale_quotation_id = $this->saleQuotation->sale_quotation_id;
            $saleQuotationItem->product_id = $this->product_id;
            $saleQuotationItem->quantity = $this->quantity;
            $saleQuotationItem->price_per_unit = Product::find($this->product_id)->selling_price;

            $saleQuotationItem->save();

            /* Update sale_quotation total amount. */
            $saleQuotation = $this->saleQuotation;
            $saleQuotation->total_amount += $saleQuotationItem->getTotalAmount();
            $saleQuotation->save();
        }

        $this->resetInputFields();
        $this->dispatch('itemAddedToSaleQuotation');

        if ($this->modes['showMobForm']) {
            $this->exitMode('showMobForm');
        }
    }

    public function updateProductList(): void
    {
        $this->products = Product::where('name', 'like', '%'.$this->add_item_name.'%')
            ->where('is_base_product', false)
            ->orderBy('name', 'ASC')
            ->get();
    }

    public function selectItem(): void
    {
        $product = Product::find($this->product_id);

        $this->price = $product->selling_price;
        $this->quantity = 1;
        $this->total = $this->price * $this->quantity;

        $this->selectedProduct = $product;
    }

    public function resetInputFields(): void
    {
        $this->add_item_name = '';
        $this->product_id = '';
        $this->quantity = '';
        $this->price = '';
        $this->total = null;

        $this->selectedProduct = null;
        $this->search_product_category_id = null;

        $this->products = Product::all();
    }

    public function updateTotal(): void
    {
        $this->total = $this->price * $this->quantity;
    }

    public function selectProductCategory(): void
    {
        $validatedData = $this->validate([
            'search_product_category_id' => 'required|integer',
        ]);

        $this->selectedProduct = null;
        $this->quantity = '';

        $this->products =
            ProductCategory::find($validatedData['search_product_category_id'])
                ->products()->where('is_base_product', false)
                ->orderBy('name', 'ASC')
                ->get();
    }

    public function checkExistingItemsForProduct($saleQuotation, $productId): SaleQuotationItem|null 
    {
        foreach ($saleQuotation->saleQuotationItems as $saleQuotationItem) {
            if ($saleQuotationItem->product_id == $productId) {
                return $saleQuotationItem;
            }
        }

        return null;
    }

    public function updateSaleQuotationTotalAmount($saleQuotation, $saleQuotationItem, $quantity): void
    {
        $product = $saleQuotationItem->product;

        $saleQuotation->total_amount += $product->selling_price * $quantity;
        $saleQuotation->save();
    }

    public function showAddItemFormMob(): void
    {
        $this->enterMode('showMobForm');
    }

    public function hideAddItemFormMob(): void
    {
        $this->exitMode('showMobForm');
    }
}
