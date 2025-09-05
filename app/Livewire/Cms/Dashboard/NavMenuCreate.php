<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\Cms\CmsNavMenu\CmsNavMenu;

class NavMenuCreate extends Component
{
    public $name;

    public function render(): View
    {
        return view('livewire.cms.dashboard.nav-menu-create');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'name' => 'required',
        ]);

        CmsNavMenu::create($validatedData);

        $this->dispatch('cmsNavMenuAdded');
    }
}
