<?php

namespace App\Http\Livewire\Cms\Dashboard;

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
    ];

    protected $listeners = [
        'exitCreatePostMode',
        'webpageAdded',
        'displayPost',
    ];

    public function render()
    {
        return view('livewire.cms.dashboard.post-component');
    }

    public function webpageAdded()
    {
        $this->exitMode('createPostMode');
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
}
