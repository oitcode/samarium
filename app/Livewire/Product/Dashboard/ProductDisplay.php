<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use App\Models\Product\ProductQuestion;
use App\Models\Product\ProductAnswer;
use App\Models\Product\ProductSpecification;
use App\Models\Product\ProductFeature;

class ProductDisplay extends Component
{
    use ModesTrait;

    public $product;

    public $answeringProductQuestion;
    public $updatingProductSpecification;

    public $updatingProductFeature;

    public $deletingProductSpecification;
    public $deletingProductFeature;

    public $modes = [
        'delete' => false,
        'canDelete' => false,
        'cannotDelete' => false,

        'updateProductNameMode' => false,
        'updateProductCategoryMode' => false,
        'updateProductDescriptionMode' => false,
        'updateProductPriceMode' => false,
        'updateProductPriceUnitMode' => false,
        'updateProductImageMode' => false,
        'updateProductAddProductSpecificationMode' => false,
        'updateProductAddProductSpecificationHeadingMode' => false,

        'createProductGalleryMode' => false,
        'updateProductVideoMode' => false,

        'createProductAnswerMode' => false,
        'updateProductAddProductFeatureMode' => false,
        'updateProductAddProductFeatureHeadingMode' => false,

        'updateProductUpdateProductSpecificationKeyword' => false,
        'updateProductUpdateProductSpecificationValue' => false,

        'updateProductUpdateProductFeature' => false,

        'updateProductUpdateProductGalleryMode' => false,

        'deleteProductSpecificationMode' => false,
        'deleteProductFeatureMode' => false,

        'updateProductAddProductOptionMode' => false,
        'updateProductAddProductOptionHeadingMode' => false,

        'updateProductUpdateProductOption' => false,
        'deleteProductOptionMode' => false,

        'linkProductVendorMode' => false,
    ];

    protected $listeners = [
        'productUpdateNameCancelled',
        'productUpdateNameCompleted',

        'productUpdateCategoryCancelled',
        'productUpdateCategoryCompleted',

        'productUpdateDescriptionCancelled',
        'productUpdateDescriptionCompleted',

        'productUpdatePriceCancelled',
        'productUpdatePriceCompleted',

        'productUpdatePriceUnitCancelled',
        'productUpdatePriceUnitCompleted',

        'productUpdateImageCancelled',
        'productUpdateImageCompleted',

        'productEditAddProductSpecificationModeCancelled',
        'productEditAddProductSpecificationModeCompleted',

        'productEditAddProductSpecificationHeadingModeCancelled',
        'productEditAddProductSpecificationHeadingModeCompleted',

        'productEditAddProductFeatureModeCancelled',
        'productEditAddProductFeatureModeCompleted',

        'productEditAddProductFeatureHeadingModeCancelled',
        'productEditAddProductFeatureHeadingModeCompleted',

        'createProductGalleryCompleted',
        'createProductGalleryCancelled',

        'productUpdateVideoLinkCompleted',
        'productUpdateVideoLinkCancelled',

        'createProductAnswerCompleted',
        'createProductAnswerCancelled',

        'productSpecificationUpdateKeywordCancelled',
        'productSpecificationUpdateKeywordCompleted',

        'productSpecificationUpdateValueCancelled',
        'productSpecificationUpdateValueCompleted',

        'productFeatureUpdateCancelled',
        'productFeatureUpdateCompleted',

        'productEditAddProductOptionHeadingModeCancelled',
        'productEditAddProductOptionHeadingModeCompleted',

        'productEditAddProductOptionModeCancelled',
        'productEditAddProductOptionModeCompleted',

        'productVendorLinkCompleted',
        'productVendorLinkCancelled',
    ];

    public function render(): View
    {
        return view('livewire.product.dashboard.product-display');
    }

    public function productUpdateNameCancelled(): void
    {
        $this->exitMode('updateProductNameMode');
    }

    public function productUpdateNameCompleted(): void
    {
        session()->flash('message', 'Product updated');
        $this->exitMode('updateProductNameMode');
    }

    public function productUpdateDescriptionCancelled(): void
    {
        $this->exitMode('updateProductDescriptionMode');
    }

    public function productUpdateDescriptionCompleted(): void
    {
        session()->flash('message', 'Product updated');
        $this->exitMode('updateProductDescriptionMode');
    }

    public function productUpdatePriceCancelled(): void
    {
        $this->exitMode('updateProductPriceMode');
    }

    public function productUpdatePriceCompleted(): void
    {
        session()->flash('message', 'Product updated');
        $this->exitMode('updateProductPriceMode');
    }

    public function productUpdatePriceUnitCancelled(): void
    {
        $this->exitMode('updateProductPriceUnitMode');
    }

    public function productUpdatePriceUnitCompleted(): void
    {
        session()->flash('message', 'Product updated');
        $this->exitMode('updateProductPriceUnitMode');
    }

    public function productUpdateImageCancelled(): void
    {
        $this->exitMode('updateProductImageMode');
    }

    public function productUpdateImageCompleted(): void
    {
        session()->flash('message', 'Product updated');
        $this->exitMode('updateProductImageMode');
    }

    public function makeProductInactive(): void
    {
        $this->product->is_active = 0;
        $this->product->save();
        session()->flash('message', 'Product made inactive.');
    }

    public function makeProductActive(): void
    {
        $this->product->is_active = 1;
        $this->product->save();
        session()->flash('message', 'Product made active.');
    }

    public function makeProductNotVisibleInFrontEnd(): void
    {
        $this->product->show_in_front_end = 'no';
        $this->product->save();
        session()->flash('message', 'Product website visibility turned off.');
    }

    public function makeProductVisibleInFrontEnd(): void
    {
        $this->product->show_in_front_end = 'yes';
        $this->product->save();
        session()->flash('message', 'Product website visibility turned on.');
    }

    public function productEditAddProductSpecificationModeCompleted(): void
    {
        $this->exitMode('updateProductAddProductSpecificationMode');
        session()->flash('addSpecMessage', 'Product specification added');
    }

    public function productEditAddProductSpecificationModeCancelled(): void
    {
        $this->exitMode('updateProductAddProductSpecificationMode');
    }

    public function productEditAddProductSpecificationHeadingModeCompleted(): void
    {
        $this->exitMode('updateProductAddProductSpecificationHeadingMode');
        session()->flash('addSpecMessage', 'Product specification heading added');
    }

    public function productEditAddProductSpecificationHeadingModeCancelled(): void
    {
        $this->exitMode('updateProductAddProductSpecificationHeadingMode');
    }

    public function productEditAddProductFeatureModeCompleted(): void
    {
        $this->exitMode('updateProductAddProductFeatureMode');
        session()->flash('addFeatureMessage', 'Product feature added');
    }

    public function productEditAddProductFeatureModeCancelled(): void
    {
        $this->exitMode('updateProductAddProductFeatureMode');
    }

    public function productEditAddProductFeatureHeadingModeCompleted(): void
    {
        $this->exitMode('updateProductAddProductFeatureHeadingMode');
        session()->flash('addFeatureMessage', 'Product feature heading added');
    }

    public function productEditAddProductFeatureHeadingModeCancelled(): void
    {
        $this->exitMode('updateProductAddProductFeatureHeadingMode');
    }

    public function createProductGalleryCompleted(): void
    {
        $this->exitMode('createProductGalleryMode');
    }

    public function createProductGalleryCancelled(): void
    {
        $this->exitMode('createProductGalleryMode');
    }

    public function productUpdateVideoLinkCompleted(): void
    {
        $this->exitMode('updateProductVideoMode');
    }

    public function productUpdateVideoLinkCancelled(): void
    {
        $this->exitMode('updateProductVideoMode');
    }

    public function answerQuestion(ProductQuestion $productQuestion): void
    {
        $this->answeringProductQuestion = $productQuestion;
        $this->enterMode('createProductAnswerMode');
    }

    public function createProductAnswerCompleted(): void
    {
        $this->answeringProductQuestion = null;
        $this->exitMode('createProductAnswerMode');

        session()->flash('message', 'Product Answer added');
    }

    public function createProductAnswerCancelled(): void
    {
        $this->answeringProductQuestion = null;
        $this->exitMode('createProductAnswerMode');
    }

    public function makeProductFeaturedProduct(): void
    {
        $this->product->featured_product = 'yes';
        $this->product->save();
        session()->flash('message', 'Product marked as featured product.');
    }

    public function makeProductFeaturedProductUndo(): void
    {
        $this->product->featured_product = 'no';
        $this->product->save();
        session()->flash('message', 'Product removed from featured product.');
    }

    public function updateProductSpecificationKeyword(int $productSpecificationId): void
    {
        $this->updatingProductSpecification = ProductSpecification::find($productSpecificationId);
        $this->enterMode('updateProductUpdateProductSpecificationKeyword');
    }

    public function productSpecificationUpdateKeywordCancelled(): void
    {
        $this->updatingProductSpecification = null;
        $this->exitMode('updateProductUpdateProductSpecificationKeyword');
    }

    public function productSpecificationUpdateKeywordCompleted(): void
    {
        $this->updatingProductSpecification = null;
        $this->exitMode('updateProductUpdateProductSpecificationKeyword');
    }

    public function updateProductSpecificationValue(int $productSpecificationId): void
    {
        $this->updatingProductSpecification = ProductSpecification::find($productSpecificationId);
        $this->enterMode('updateProductUpdateProductSpecificationValue');
    }

    public function productSpecificationUpdateValueCancelled(): void
    {
        $this->updatingProductSpecification = null;
        $this->exitMode('updateProductUpdateProductSpecificationValue');
    }

    public function productSpecificationUpdateValueCompleted(): void
    {
        $this->updatingProductSpecification = null;
        $this->exitMode('updateProductUpdateProductSpecificationValue');
    }

    public function updateProductFeature(int $productFeatureId): void
    {
        $this->updatingProductFeature = ProductFeature::find($productFeatureId);
        $this->enterMode('updateProductUpdateProductFeature');
    }

    public function productFeatureUpdateCancelled(): void
    {
        $this->updatingProductFeature = null;
        $this->exitMode('updateProductUpdateProductFeature');
    }

    public function productFeatureUpdateCompleted(): void
    {
        $this->updatingProductFeature = null;
        $this->exitMode('updateProductUpdateProductFeature');
    }

    public function deleteProductSpecification(int $productSpecificationId): void
    {
        $this->deletingProductSpecification = ProductSpecification::find($productSpecificationId); 
        $this->enterMode('deleteProductSpecificationMode');
    }

    public function cancelDeleteProductSpecification(): void
    {
        $this->deletingProductSpecification = null;
        $this->exitMode('deleteProductSpecificationMode');
    }

    public function confirmDeleteProductSpecification(ProductSpecification $productSpecification): void
    {
        $this->deletingProductSpecification->delete();
        $this->deletingProductSpecification = null;
        $this->exitMode('deleteProductSpecificationMode');
        $this->product->refresh();
    }

    public function deleteProductFeature(int $productFeatureId): void
    {
        $this->deletingProductFeature = ProductFeature::find($productFeatureId);
        $this->enterMode('deleteProductFeatureMode');
    }

    public function cancelDeleteProductFeature(): void
    {
        $this->deletingProductFeature = null;
        $this->exitMode('deleteProductFeatureMode');
    }

    public function confirmDeleteProductFeature(ProductFeature $productFeature): void
    {
        $this->deletingProductFeature->delete();
        $this->deletingProductFeature = null;
        $this->exitMode('deleteProductFeatureMode');
        $this->product->refresh();
    }

    public function productEditAddProductOptionHeadingModeCancelled(): void
    {
        $this->exitMode('updateProductAddProductOptionHeadingMode');
    }

    public function productEditAddProductOptionHeadingModeCompleted(): void
    {
        $this->exitMode('updateProductAddProductOptionHeadingMode');
        session()->flash('addProductOptionMessage', 'Product option heading added');
    }

    public function productEditAddProductOptionModeCancelled(): void
    {
        $this->exitMode('updateProductAddProductOptionMode');
    }

    public function productEditAddProductOptionModeCompleted(): void
    {
        $this->exitMode('updateProductAddProductOptionMode');
        session()->flash('addProductOptionMessage', 'Product option dded');
    }

    public function productUpdateCategoryCompleted(): void
    {
        $this->exitMode('updateProductCategoryMode');
        session()->flash('editProductCategoryMessage', 'Product category updated');
    }

    public function productUpdateCategoryCancelled(): void
    {
        $this->exitMode('updateProductCategoryMode');
    }

    public function productVendorLinkCompleted(): void
    {
        $this->exitMode('linkProductVendorMode');
    }

    public function productVendorLinkCancelled(): void
    {
        $this->exitMode('linkProductVendorMode');
    }

    public function deleteProduct(): void
    {
        $this->enterMode('delete');

        if ($this->product->saleInvoiceItems && count($this->product->saleInvoiceItems) > 0) {
            $this->enterModeSilent('cannotDelete');
        } else {
            $this->enterModeSilent('canDelete');
        }

    }

    public function deleteProductConfirm() // TODO: Type hint return type
    {
        $this->product->delete();

        session()->flash('message', 'Product deleted.');

        /*
         * Is this a good approach? Instead of redirecting cant we just emit some event 
         * and do something better?
         *
         */
        return redirect()->to('/dashboard/product');

    }

    public function closeThisComponent(): void
    {
        $this->dispatch('exitProductDisplayMode');
    }
}
