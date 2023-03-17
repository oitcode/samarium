<?php

namespace App\Http\Livewire\Cms\Website;

use Livewire\Component;

use App\Webpage;

class PostList extends Component
{
    public $posts;

    public function render()
    {
        $this->posts = Webpage::where('is_post', 'yes')->where('visibility', 'public')->orderBy('webpage_id', 'DESC')->get();

        return view('livewire.cms.website.post-list');
    }
}
