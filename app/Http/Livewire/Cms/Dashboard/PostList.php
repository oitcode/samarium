<?php

namespace App\Http\Livewire\Cms\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;

use App\Webpage;

class PostList extends Component
{
    use WithPagination;

    /* Use bootstrap pagination theme */
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $posts = Webpage::where('is_post', 'yes')->orderBy('webpage_id', 'DESC')->paginate(10);

        return view('livewire.cms.dashboard.post-list')
            ->with('posts', $posts);
    }
}
