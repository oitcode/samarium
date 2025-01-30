<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;
use App\Webpage;
use App\Gallery;

class CmsGlance extends Component
{
    public $webpageCount;
    public $postCount;
    public $galleryCount;

    public function render()
    {
        $this->webpageCount = Webpage::where('is_post', 'no')->get()->count();
        $this->postCount = Webpage::where('is_post', 'yes')->get()->count();
        $this->galleryCount = Gallery::all()->count();

        return view('livewire.cms.dashboard.cms-glance');
    }
}
