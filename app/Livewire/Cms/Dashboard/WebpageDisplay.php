<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithFileUploads;
use App\Traits\ModesTrait;
use App\Webpage;
use App\WebpageCategory;
use App\WebpageWebpageCategory;

class WebpageDisplay extends Component
{
    use ModesTrait;
    use WithFileUploads;

    public $webpage;

    public $featured_image;

    public $modes = [
        'createWebpageContent' =>false,
        'editVisibilityMode' => false,
        'editWebpageCategoryMode' => false,
        'editFeaturedImageMode' => false,
        'editWebpageCategoryPostpageMode' => false,
        'editTeamTeampageMode' => false,
        'editWebpageProductCategoryMode' => false,
    ];

    protected $listeners = [
        'webpageContentAdded' => 'exitCreateWebpageContent',
        'webpageContentCreateCancelledL2' => 'exitCreateWebpageContent',
        'exitCreateWebpageContent',
        'webpageContentDeleted' => 'render',
        'webpageContentPositionChanged' => 'render',
        'webpageContentUpdated' => 'render',
        'webpageEditVisibilityCancel',
        'webpageEditVisibilityCompleted',
        'webpageEditWebpageCategoryCancel',
        'webpageEditWebpageCategoryCompleted',
        'webpageEditFeaturedImageCancel',
        'webpageEditFeaturedImageCompleted',
        'webpageEditWebpageCategoryPostpageCompleted',
        'webpageEditWebpageCategoryPostpageCancel',
        'webpageEditTeamTeampageCompleted',
        'webpageEditTeamTeampageCancel',
        'webpageEditProductCategoryCancel',
        'webpageEditProductCategoryCompleted',
    ];

    public function render(): View
    {
        return view('livewire.cms.dashboard.webpage-display');
    }

    public function exitCreateWebpageContent(): void
    {
        $this->exitMode('createWebpageContent');
    }

    public function addFeaturedImage(): void
    {
        $validatedData = $this->validate([
            'featured_image' => 'required|image',
        ]);

        $image_path = $this->featured_image->store('webpage-content', 'public');
        $this->webpage->featured_image_path = $image_path;
        $this->webpage->save();

        $this->render();
    }

    public function webpageEditVisibilityCancel(): void
    {
        $this->exitMode('editVisibilityMode');
    }

    public function webpageEditVisibilityCompleted(): void
    {
        $this->exitMode('editVisibilityMode');
    }

    public function webpageEditWebpageCategoryCancel(): void
    {
        $this->exitMode('editWebpageCategoryMode');
    }

    public function webpageEditWebpageCategoryCompleted(): void
    {
        $this->exitMode('editWebpageCategoryMode');
    }

    public function webpageEditFeaturedImageCancel(): void
    {
        $this->exitMode('editFeaturedImageMode');
    }

    public function webpageEditFeaturedImageCompleted(): void
    {
        $this->exitMode('editFeaturedImageMode');
    }

    public function removeFeaturedImage(): void
    {
        $this->webpage->featured_image_path = null;
        $this->webpage->update();

        $this->render();
    }

    public function makeWebpageFeaturedWebpage(): void
    {
        $this->webpage->featured_webpage = 'yes';
        $this->webpage->update();

        $this->render();
    }

    public function makeWebpageFeaturedWebpageUndo(): void
    {
        $this->webpage->featured_webpage = 'no';
        $this->webpage->update();

        $this->render();
    }

    public function webpageEditWebpageCategoryPostpageCompleted(): void
    {
        $this->exitMode('editWebpageCategoryPostpageMode');
    }

    public function webpageEditWebpageCategoryPostpageCancel(): void
    {
        $this->exitMode('editWebpageCategoryPostpageMode');
    }

    public function webpageEditTeamTeampageCompleted(): void
    {
        $this->exitMode('editTeamTeampageMode');
    }

    public function webpageEditTeamTeampageCancel(): void
    {
        $this->exitMode('editTeamTeampageMode');
    }

    public function webpageEditProductCategoryCancel(): void
    {
        $this->exitMode('editWebpageProductCategoryMode');
    }

    public function webpageEditProductCategoryCompleted(): void
    {
        $this->exitMode('editWebpageProductCategoryMode');
    }

    public function removePostCategory(WebpageCategory $webpageCategory, Webpage $webpage): void
    {
        $webpageWebpageCategory = WebpageWebpageCategory::where('webpage_id', $webpage->webpage_id)
                                  ->where('webpage_category_id', $webpageCategory->webpage_category_id)
                                  ->first();
        
        $webpageWebpageCategory->delete();
        $this->webpage = $this->webpage->fresh();
        $this->render();
    }

    public function closeThisComponent(): void
    {
        $this->dispatch('exitWebpageDisplayMode');
    }
}
