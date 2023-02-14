<?php

namespace App\Http\Livewire\Cms;

use Livewire\Component;

use App\Webpage;

class PostList extends Component
{
    public $posts;

    public function render()
    {
        $this->posts = Webpage::where('is_post', 'yes')->get();

        return view('livewire.cms.post-list');
    }
}
