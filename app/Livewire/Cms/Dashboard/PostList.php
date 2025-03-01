<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
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

    public function render(): View
    {
        $posts = Webpage::where('is_post', 'yes')->orderBy('webpage_id', 'DESC')->paginate(5);
        $this->totalPostCount = Webpage::where('is_post', 'yes')->count();

        return view('livewire.cms.dashboard.post-list')
            ->with('posts', $posts);
    }

    public function deletePost(Webpage $post): void
    {
        $this->deletingPost = $post;

        $this->enterMode('delete');
    }

    public function deletePostCancel(): void
    {
        $this->deletingPost = null;
        $this->exitMode('delete');
    }

    public function confirmDeletePost(): void
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
