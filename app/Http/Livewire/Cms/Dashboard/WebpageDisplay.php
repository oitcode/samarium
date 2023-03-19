<?php

namespace App\Http\Livewire\Cms\Dashboard;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Traits\ModesTrait;

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
    ];

    protected $listeners = [
        'webpageContentAdded' => 'exitCreateWebpageContent',
        'exitCreateWebpageContent',
        'webpageContentDeleted' => 'render',
        'webpageContentPositionChanged' => 'render',

        /* */
        'webpageEditVisibilityCancel',
        'webpageEditVisibilityCompleted',

        'webpageEditWebpageCategoryCancel',
        'webpageEditWebpageCategoryCompleted',

        'webpageEditFeaturedImageCancel',
        'webpageEditFeaturedImageCompleted',
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
}
