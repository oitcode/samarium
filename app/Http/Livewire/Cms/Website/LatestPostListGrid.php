<?php

namespace App\Http\Livewire\Cms\Website;

use Livewire\Component;

use App\Webpage;
use App\WebpageCategory;

class LatestPostListGrid extends Component
{
    public $webpages;

    public $category = null;

    public function render()
    {
        // $this->webpages = Webpage::where('is_post', 'yes')->where('visibility', 'public')->orderBy('webpage_id', 'desc')->limit(4)->get();

        if ($this->category) {
            $postCategory = WebpageCategory::where('name', $this->category)->first();
            $this->webpages = $postCategory->webpages()->where('visibility', 'public')->orderBy('webpage_id', 'DESC')->get();
        } else {
            $this->webpages = Webpage::where('is_post', 'yes')
                                  ->where('visibility', 'public')
                                  ->whereDoesntHave('webpageCategories', function ($query) {
                                      $query->where('name', 'activities');
                                  })
                                  ->orderBy('webpage_id', 'desc')
                                  ->limit(4)
                                  ->get();

        }

        return view('livewire.cms.website.latest-post-list-grid');
    }
}
