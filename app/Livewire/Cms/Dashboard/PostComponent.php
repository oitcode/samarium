<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;
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

    public function render()
    {
        return view('livewire.cms.dashboard.post-component');
    }

    public function exitCreatePostMode()
    {
        $this->exitMode('createPostMode');
    }

    public function displayPost(Webpage $post)
    {
        $this->displayingPost = $post;
        $this->enterMode('displayPostMode');
    }

    public function createPostCategoryCanceled()
    {
        $this->exitMode('createPostCategoryMode');
    }

    public function createPostCategoryCompleted()
    {
        $this->exitMode('createPostCategoryMode');
        session()->flash('message', 'Post category created');
    }

    public function exitWebpageDisplayMode()
    {
        $this->clearModes();
    }

    public function webpageAdded($webpageId)
    {
        $webpage = Webpage::find($webpageId);

        $this->displayPost($webpage);
    }
}
