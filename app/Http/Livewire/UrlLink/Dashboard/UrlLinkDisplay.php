<?php

namespace App\Http\Livewire\UrlLink\Dashboard;

use Livewire\Component;

use App\Traits\ModesTrait;

class UrlLinkDisplay extends Component
{
    use ModesTrait;

    public $urlLink;

    public $modes = [
        'updateUrlMode' => false,
        'updateDescriptionMode' => false,

        'editUserGroupMode' => false,
    ];

    protected $listeners = [
        'urlLinkEditUserGroupCancel',
        'urlLinkEditUserGroupCompleted',
    ];

    public function render()
    {
        return view('livewire.url-link.dashboard.url-link-display');
    }

    public function urlLinkEditUserGroupCancel()
    {
        $this->exitMode('editUserGroupMode');
    }

    public function urlLinkEditUserGroupCompleted()
    {
        $this->exitMode('editUserGroupMode');
    }
}
