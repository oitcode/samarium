<?php

namespace App\Http\Livewire\Cms\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;

use App\Traits\ModesTrait;

use App\Webpage;

class PostList extends Component
{
    use WithPagination;
    use ModesTrait;

    /* Use bootstrap pagination theme */
    protected $paginationTheme = 'bootstrap';

    public $totalPostCount;

    public $deletingPost;

    public $modes = [
        'delete' => false,
    ];

    public function render()
    {
        $posts = Webpage::where('is_post', 'yes')->orderBy('webpage_id', 'DESC')->paginate(5);
        $this->totalPostCount = Webpage::where('is_post', 'yes')->count();

        return view('livewire.cms.dashboard.post-list')
            ->with('posts', $posts);
    }

    public function deletePost(Webpage $post)
    {
        $this->deletingPost = $post;

        $this->enterMode('delete');
    }

    public function deletePostCancel()
    {
        $this->deletingPost = null;
        $this->exitMode('delete');
    }

    public function confirmDeletePost()
    {
        foreach ($this->deletingPost->webpageContents as $webpageContent) {
            foreach ($webpageContent->cmsWebpageContentCssOptions as $option) {
                $option->delete();
            }

            $webpageContent->delete();
        }

        $this->deletingPost->delete();

        $this->deletingPost = null; 
        $this->exitMode('delete');
    }
}
