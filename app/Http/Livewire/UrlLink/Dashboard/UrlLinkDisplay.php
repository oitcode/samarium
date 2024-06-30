<?php

namespace App\Http\Livewire\UrlLink\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Gate;
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

    public function render()
    {
        if (Gate::allows('view-url-link', $this->urlLink)) {
            return view('livewire.url-link.dashboard.url-link-display');
        } else {
            return '<div>You are not allowed to view this resource.</div>';
        }
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
