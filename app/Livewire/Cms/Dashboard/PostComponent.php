<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use App\Webpage;

class PostComponent extends Component
{
    use ModesTrait;

    public $displayingPost = null;

    public $modes = [
        'createPostMode' => false,
        'listPostMode' => true,
        'displayPostMode' => false,
        'createPostCategoryMode' => false,
        'search' =>false,
    ];

    protected $listeners = [
        'exitCreatePostMode',
        'webpageAdded',
        'displayPost',
        'createPostCategoryCompleted',
        'createPostCategoryCanceled',

        'exitWebpageDisplayMode',
        'webpageAdded',
    ];

    public function render(): View
    {
        return view('livewire.cms.dashboard.post-component');
    }

    public function exitCreatePostMode(): void
    {
        $this->exitMode('createPostMode');
    }

    public function displayPost(int $postId): void
    {
        $this->displayingPost = Webpage::find($postId);
        $this->enterMode('displayPostMode');
    }

    public function createPostCategoryCanceled(): void
    {
        $this->exitMode('createPostCategoryMode');
    }

    public function createPostCategoryCompleted(): void
    {
        $this->exitMode('createPostCategoryMode');
        session()->flash('message', 'Post category created');
    }

    public function exitWebpageDisplayMode(): void
    {
        $this->clearModes();
    }

    public function webpageAdded($webpageId): void
    {
        $webpage = Webpage::find($webpageId);

        $this->displayPost($webpage);
    }
}
