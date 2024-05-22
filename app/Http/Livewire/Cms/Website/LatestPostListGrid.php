<?php

namespace App\Http\Livewire\Cms\Website;

use Livewire\Component;

use App\Webpage;

class LatestPostListGrid extends Component
{
    public $webpages;

    public function render()
    {
        $this->webpages = Webpage::where('is_post', 'yes')->where('visibility', 'public')->orderBy('webpage_id', 'desc')->limit(4)->get();

        return view('livewire.cms.website.latest-post-list-grid');
    }
}
