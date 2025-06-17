<?php

namespace App\Livewire\UrlLink\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\User\UserGroup;
use App\Models\UrlLink\UrlLinkUserGroup;

class UrlLinkEditUserGroup extends Component
{
    public $urlLink;

    public $userGroups;

    public $user_group_id;

    public function render(): View
    {
        $this->userGroups = UserGroup::all();

        return view('livewire.url-link.dashboard.url-link-edit-user-group');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'user_group_id' => 'required',
        ]);

        $validatedData['url_link_id'] = $this->urlLink->url_link_id;

        UrlLinkUserGroup::create($validatedData);

        $this->dispatch('urlLinkEditUserGroupCompleted');
    }
}
