<?php

namespace App\Http\Livewire\Product\Dashboard;

use Livewire\Component;

use App\Traits\ModesTrait;

use App\ProductQuestion;
use App\ProductAnswer;
use App\ProductSpecification;
use App\ProductFeature;

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
        'updateProductNameMode' => false,
        'updateProductCategoryMode' => false,
        'updateProductDescriptionMode' => false,
        'updateProductPriceMode' => false,
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
    ];

    public function render()
    {
        return view('livewire.product.dashboard.product-display');
    }

    public function productUpdateNameCancelled()
    {
        $this->exitMode('updateProductNameMode');
    }

    public function productUpdateNameCompleted()
    {
        session()->flash('message', 'Product updated');
        $this->exitMode('updateProductNameMode');
    }

    public function productUpdateDescriptionCancelled()
    {
        $this->exitMode('updateProductDescriptionMode');
    }

    public function productUpdateDescriptionCompleted()
    {
        session()->flash('message', 'Product updated');
        $this->exitMode('updateProductDescriptionMode');
    }

    public function productUpdatePriceCancelled()
    {
        $this->exitMode('updateProductPriceMode');
    }

    public function productUpdatePriceCompleted()
    {
        session()->flash('message', 'Product updated');
        $this->exitMode('updateProductPriceMode');
    }

    public function productUpdateImageCancelled()
    {
        $this->exitMode('updateProductImageMode');
    }

    public function productUpdateImageCompleted()
    {
        session()->flash('message', 'Product updated');
        $this->exitMode('updateProductImageMode');
    }

    public function makeProductInactive()
    {
        $this->product->is_active = 0;
        $this->product->save();
        session()->flash('message', 'Product made inactive.');
    }

    public function makeProductActive()
    {
        $this->product->is_active = 1;
        $this->product->save();
        session()->flash('message', 'Product made active.');
    }

    public function makeProductNotVisibleInFrontEnd()
    {
        $this->product->show_in_front_end = 'no';
        $this->product->save();
        session()->flash('message', 'Product website visibility turned off.');
    }

    public function makeProductVisibleInFrontEnd()
    {
        $this->product->show_in_front_end = 'yes';
        $this->product->save();
        session()->flash('message', 'Product website visibility turned on.');
    }

    public function productEditAddProductSpecificationModeCompleted()
    {
        $this->exitMode('updateProductAddProductSpecificationMode');
        session()->flash('addSpecMessage', 'Product specification added');
    }

    public function productEditAddProductSpecificationModeCancelled()
    {
        $this->exitMode('updateProductAddProductSpecificationMode');
    }

    public function productEditAddProductSpecificationHeadingModeCompleted()
    {
        $this->exitMode('updateProductAddProductSpecificationHeadingMode');
        session()->flash('addSpecMessage', 'Product specification heading added');
    }

    public function productEditAddProductSpecificationHeadingModeCancelled()
    {
        $this->exitMode('updateProductAddProductSpecificationHeadingMode');
    }

    public function productEditAddProductFeatureModeCompleted()
    {
        $this->exitMode('updateProductAddProductFeatureMode');
        session()->flash('addFeatureMessage', 'Product feature added');
    }

    public function productEditAddProductFeatureModeCancelled()
    {
        $this->exitMode('updateProductAddProductFeatureMode');
    }

    public function productEditAddProductFeatureHeadingModeCompleted()
    {
        $this->exitMode('updateProductAddProductFeatureHeadingMode');
        session()->flash('addFeatureMessage', 'Product feature heading added');
    }

    public function productEditAddProductFeatureHeadingModeCancelled()
    {
        $this->exitMode('updateProductAddProductFeatureHeadingMode');
    }

    public function createProductGalleryCompleted()
    {
        $this->exitMode('createProductGalleryMode');
    }

    public function createProductGalleryCancelled()
    {
        $this->exitMode('createProductGalleryMode');
    }

    public function productUpdateVideoLinkCompleted()
    {
        $this->exitMode('updateProductVideoMode');
    }

    public function productUpdateVideoLinkCancelled()
    {
        $this->exitMode('updateProductVideoMode');
    }

    public function answerQuestion(ProductQuestion $productQuestion)
    {
        $this->answeringProductQuestion = $productQuestion;
        $this->enterMode('createProductAnswerMode');
    }

    public function createProductAnswerCompleted()
    {
        $this->answeringProductQuestion = null;
        $this->exitMode('createProductAnswerMode');

        session()->flash('message', 'Product Answer added');
    }

    public function createProductAnswerCancelled()
    {
        $this->answeringProductQuestion = null;
        $this->exitMode('createProductAnswerMode');
    }

    public function makeProductFeaturedProduct()
    {
        $this->product->featured_product = 'yes';
        $this->product->save();
        session()->flash('message', 'Product marked as featured product.');
    }

    public function makeProductFeaturedProductUndo()
    {
        $this->product->featured_product = 'no';
        $this->product->save();
        session()->flash('message', 'Product removed from featured product.');
    }

    public function updateProductSpecificationKeyword(ProductSpecification $productSpecification)
    {
        $this->enterMode('updateProductUpdateProductSpecificationKeyword');
        $this->updatingProductSpecification = $productSpecification;
    }

    public function productSpecificationUpdateKeywordCancelled()
    {
        $this->updatingProductSpecification = null;
        $this->exitMode('updateProductUpdateProductSpecificationKeyword');
    }

    public function productSpecificationUpdateKeywordCompleted()
    {
        $this->updatingProductSpecification = null;
        $this->exitMode('updateProductUpdateProductSpecificationKeyword');
    }

    public function updateProductSpecificationValue(ProductSpecification $productSpecification)
    {
        $this->enterMode('updateProductUpdateProductSpecificationValue');
        $this->updatingProductSpecification = $productSpecification;
    }

    public function productSpecificationUpdateValueCancelled()
    {
        $this->updatingProductSpecification = null;
        $this->exitMode('updateProductUpdateProductSpecificationValue');
    }

    public function productSpecificationUpdateValueCompleted()
    {
        $this->updatingProductSpecification = null;
        $this->exitMode('updateProductUpdateProductSpecificationValue');
    }

    public function updateProductFeature(ProductFeature $productFeature)
    {
        $this->enterMode('updateProductUpdateProductFeature');
        $this->updatingProductFeature = $productFeature;
    }

    public function productFeatureUpdateCancelled()
    {
        $this->updatingProductFeature = null;
        $this->exitMode('updateProductUpdateProductFeature');
    }

    public function productFeatureUpdateCompleted()
    {
        $this->updatingProductFeature = null;
        $this->exitMode('updateProductUpdateProductFeature');
    }

    public function deleteProductSpecification(ProductSpecification $productSpecification)
    {
        $this->deletingProductSpecification = $productSpecification; 
        $this->enterMode('deleteProductSpecificationMode');
    }

    public function cancelDeleteProductSpecification()
    {
        $this->deletingProductSpecification = null;
        $this->exitMode('deleteProductSpecificationMode');
    }

    public function confirmDeleteProductSpecification(ProductSpecification $productSpecification)
    {
        $this->deletingProductSpecification->delete();
        $this->deletingProductSpecification = null;
        $this->exitMode('deleteProductSpecificationMode');
        $this->product->refresh();
    }

    public function deleteProductFeature(ProductFeature $productFeature)
    {
        $this->deletingProductFeature = $productFeature; 
        $this->enterMode('deleteProductFeatureMode');
    }

    public function cancelDeleteProductFeature()
    {
        $this->deletingProductFeature = null;
        $this->exitMode('deleteProductFeatureMode');
    }

    public function confirmDeleteProductFeature(ProductFeature $productFeature)
    {
        $this->deletingProductFeature->delete();
        $this->deletingProductFeature = null;
        $this->exitMode('deleteProductFeatureMode');
        $this->product->refresh();
    }

    public function productEditAddProductOptionHeadingModeCancelled()
    {
        $this->exitMode('updateProductAddProductOptionHeadingMode');
    }

    public function productEditAddProductOptionHeadingModeCompleted()
    {
        $this->exitMode('updateProductAddProductOptionHeadingMode');
        session()->flash('addProductOptionMessage', 'Product option heading added');
    }

    public function productEditAddProductOptionModeCancelled()
    {
        $this->exitMode('updateProductAddProductOptionMode');
    }

    public function productEditAddProductOptionModeCompleted()
    {
        $this->exitMode('updateProductAddProductOptionMode');
        session()->flash('addProductOptionMessage', 'Product option dded');
    }

    public function productUpdateCategoryCompleted()
    {
        $this->exitMode('updateProductCategoryMode');
        session()->flash('editProductCategoryMessage', 'Product category updated');
    }

    public function productUpdateCategoryCancelled()
    {
        $this->exitMode('updateProductCategoryMode');
    }
}
