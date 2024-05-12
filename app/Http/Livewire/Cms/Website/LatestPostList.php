<?php

namespace App\Http\Livewire\Cms\Website;

use Livewire\Component;

use App\Webpage;

class LatestPostList extends Component
{
    public $webpages;

    public function render()
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
