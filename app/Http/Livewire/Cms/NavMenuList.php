<?php

namespace App\Http\Livewire\Cms;

use Livewire\Component;

use App\CmsNavMenu;

class NavMenuList extends Component
{
    public $cmsNavMenus;

    public function render()
    {
        $this->cmsNavMenus = CmsNavMenu::all();

        return view('livewire.cms.nav-menu-list');
    }
}
