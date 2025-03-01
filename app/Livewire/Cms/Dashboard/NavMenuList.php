<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\CmsNavMenu;

class NavMenuList extends Component
{
    public $cmsNavMenus;

    public function render(): View
    {
        $this->cmsNavMenus = CmsNavMenu::all();

        return view('livewire.cms.dashboard.nav-menu-list');
    }
}
