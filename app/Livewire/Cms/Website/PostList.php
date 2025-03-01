<?php

namespace App\Livewire\Cms\Website;

use Livewire\Component;
use Illuminate\View\View;
use App\Webpage;
use App\WebpageCategory;

class PostList extends Component
{
    public $posts;

    public $category = null;

    public function render(): View
    {
        if ($this->category) {
            $postCategory = WebpageCategory::where('name', $this->category)->first();
            $this->posts = $postCategory->webpages()->where('visibility', 'public')->orderBy('webpage_id', 'DESC')->get();
        } else {
            $this->posts = Webpage::where('is_post', 'yes')->where('visibility', 'public')->orderBy('webpage_id', 'DESC')->get();
        }


        return view('livewire.cms.website.post-list');
    }
}
