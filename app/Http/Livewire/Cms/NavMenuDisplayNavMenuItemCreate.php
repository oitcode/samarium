<?php

namespace App\Http\Livewire\Cms;

use Livewire\Component;

use App\Webpage;
use App\CmsNavMenuItem;

class NavMenuDisplayNavMenuItemCreate extends Component
{
    public $cmsNavMenu;

    public $webpages;

    public $name;
    public $webpage_id;

    public function render()
    {
        $this->webpages = Webpage::all();

        return view('livewire.cms.nav-menu-display-nav-menu-item-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'webpage_id' => 'required|integer',
        ]);

        $cmsNavMenuItem = new CmsNavMenuItem;

        $cmsNavMenuItem->cms_nav_menu_id = $this->cmsNavMenu->cms_nav_menu_id;
        $cmsNavMenuItem->webpage_id = $validatedData['webpage_id'];
        $cmsNavMenuItem->name = $validatedData['name'];

        $cmsNavMenuItem->save();

        $this->emit('cmsNavMenuItemAdded');
    }
}
