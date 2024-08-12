<?php

namespace App\Livewire\UrlLink\Dashboard;

use Livewire\Component;

use App\UserGroup;
use App\UrlLinkUserGroup;

class UrlLinkEditUserGroup extends Component
{
    public $urlLink;

    public $userGroups;

    public $user_group_id;

    public function render()
    {
        $this->userGroups = UserGroup::all();

        return view('livewire.url-link.dashboard.url-link-edit-user-group');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'user_group_id' => 'required',
        ]);

        $validatedData['url_link_id'] = $this->urlLink->url_link_id;

        UrlLinkUserGroup::create($validatedData);

        $this->dispatch('urlLinkEditUserGroupCompleted');
    }
}
