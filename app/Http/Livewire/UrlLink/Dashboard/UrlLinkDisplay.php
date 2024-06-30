<?php

namespace App\Http\Livewire\UrlLink\Dashboard;

use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Traits\ModesTrait;

class UrlLinkDisplay extends Component
{
    use ModesTrait;
    use AuthorizesRequests;

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

    public function mount()
    {
        $this->authorize('view-url-link', $this->urlLink);
    }

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
