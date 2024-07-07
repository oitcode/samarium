<?php

namespace App\Http\Livewire\Cms\Dashboard;

use Livewire\Component;
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

        /* Various edit modes on this webpage */
        'editVisibilityMode' => false,
        'editWebpageCategoryMode' => false,
        'editFeaturedImageMode' => false,

        'editWebpageCategoryPostpageMode' => false,
        'editTeamTeampageMode' => false,
    ];

    protected $listeners = [
        'webpageContentAdded' => 'exitCreateWebpageContent',
        'webpageContentCreateCancelledL2' => 'exitCreateWebpageContent',
        'exitCreateWebpageContent',
        'webpageContentDeleted' => 'render',
        'webpageContentPositionChanged' => 'render',
        'webpageContentUpdated' => 'render',

        /* */
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
    ];

    public function render()
    {
        return view('livewire.cms.dashboard.webpage-display');
    }

    public function exitCreateWebpageContent()
    {
        $this->exitMode('createWebpageContent');
    }

    public function addFeaturedImage()
    {
        $validatedData = $this->validate([
            'featured_image' => 'required|image',
        ]);

        $image_path = $this->featured_image->store('webpage-content', 'public');
        $this->webpage->featured_image_path = $image_path;
        $this->webpage->save();

        $this->render();
    }

    public function webpageEditVisibilityCancel()
    {
        $this->exitMode('editVisibilityMode');
    }

    public function webpageEditVisibilityCompleted()
    {
        $this->exitMode('editVisibilityMode');
    }

    public function webpageEditWebpageCategoryCancel()
    {
        $this->exitMode('editWebpageCategoryMode');
    }

    public function webpageEditWebpageCategoryCompleted()
    {
        $this->exitMode('editWebpageCategoryMode');
    }

    public function webpageEditFeaturedImageCancel()
    {
        $this->exitMode('editFeaturedImageMode');
    }

    public function webpageEditFeaturedImageCompleted()
    {
        $this->exitMode('editFeaturedImageMode');
    }

    public function removeFeaturedImage()
    {
        $this->webpage->featured_image_path = null;
        $this->webpage->update();

        $this->render();
    }

    public function makeWebpageFeaturedWebpage()
    {
        $this->webpage->featured_webpage = 'yes';
        $this->webpage->update();

        $this->render();
    }

    public function makeWebpageFeaturedWebpageUndo()
    {
        $this->webpage->featured_webpage = 'no';
        $this->webpage->update();

        $this->render();
    }

    public function webpageEditWebpageCategoryPostpageCompleted()
    {
        $this->exitMode('editWebpageCategoryPostpageMode');
    }

    public function webpageEditWebpageCategoryPostpageCancel()
    {
        $this->exitMode('editWebpageCategoryPostpageMode');
    }

    public function webpageEditTeamTeampageCompleted()
    {
        $this->exitMode('editTeamTeampageMode');
    }

    public function webpageEditTeamTeampageCancel()
    {
        $this->exitMode('editTeamTeampageMode');
    }

    public function removePostCategory(WebpageCategory $webpageCategory, Webpage $webpage)
    {
        $webpageWebpageCategory = WebpageWebpageCategory::where('webpage_id', $webpage->webpage_id)
                                  ->where('webpage_category_id', $webpageCategory->webpage_category_id)
                                  ->first();
        
        $webpageWebpageCategory->delete();
        $this->webpage = $this->webpage->fresh();
        $this->render();
    }
}
