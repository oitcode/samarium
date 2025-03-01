<?php

namespace App\Livewire\Cms\Website;

use Livewire\Component;
use Illuminate\View\View;
use App\Webpage;

class LatestPostList extends Component
{
    public $webpages;

    public function render(): View
    {
        $this->webpages = Webpage::where('is_post', 'yes')
                              ->where('visibility', 'public')
                              ->whereDoesntHave('webpageCategories', function ($query) {
                                  $query->where('name', 'notice');
                              })
                              ->orderBy('webpage_id', 'desc')
                              ->get();

        return view('livewire.cms.website.latest-post-list');
    }
}
