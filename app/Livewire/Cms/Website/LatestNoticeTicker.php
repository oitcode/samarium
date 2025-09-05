<?php

namespace App\Livewire\Cms\Website;

use Livewire\Component;
use App\Models\Cms\Webpage\Webpage;
use App\Models\Cms\Webpage\WebpageCategory;

class LatestNoticeTicker extends Component
{
    public $notices;

    public function render()
    {
        if (WebpageCategory::where('name', 'notice')->first()) {
            $this->notices = WebpageCategory::where('name', 'notice')->first()->webPages()
                ->where('visibility', 'public')
                ->orderBy('webpage_id', 'desc')->limit(3)->get();
        } else {
            $this->notices = null;
        }

        return view('livewire.cms.website.latest-notice-ticker');
    }
}
