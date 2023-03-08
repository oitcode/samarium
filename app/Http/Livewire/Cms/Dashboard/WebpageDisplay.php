<?php

namespace App\Http\Livewire\Cms\Dashboard;

use Livewire\Component;
use Livewire\WithFileUploads;

class WebpageDisplay extends Component
{
    use WithFileUploads;

    public $webpage;

    public $featured_image;

    public $modes = [
        'createWebpageContent' =>false,
    ];

    protected $listeners = [
        'webpageContentAdded' => 'exitCreateWebpageContent',
        'exitCreateWebpageContent',
        'webpageContentDeleted' => 'render',
        'webpageContentPositionChanged' => 'render',
    ];

    public function render()
    {
        return view('livewire.cms.dashboard.webpage-display');
    }

    /* Clear modes */
    public function clearModes()
    {
        foreach ($this->modes as $key => $val) {
            $this->modes[$key] = false;
        }
    }

    /* Enter and exit mode */
    public function enterMode($modeName)
    {
        $this->clearModes();

        $this->modes[$modeName] = true;
    }

    public function exitMode($modeName)
    {
        $this->modes[$modeName] = false;
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
}
