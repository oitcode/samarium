<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;
use App\Webpage;
use App\CmsNavMenuItem;

class NavMenuDisplayNavMenuItemCreate extends Component
{
    public $cmsNavMenu;

    public $webpages;

    public $name;
    public $o_type;
    public $webpage_id;

    public function render()
    {
        $this->webpages = Webpage::where('is_post', 'no')->where('visibility', 'public')->get();

        return view('livewire.cms.dashboard.nav-menu-display-nav-menu-item-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'o_type' => 'required',
            'webpage_id' => 'nullable',
        ]);

        $cmsNavMenuItem = new CmsNavMenuItem;

        $cmsNavMenuItem->cms_nav_menu_id = $this->cmsNavMenu->cms_nav_menu_id;

        if ($validatedData['webpage_id']) {
            $cmsNavMenuItem->webpage_id = $validatedData['webpage_id'];
        }

        if ($validatedData['webpage_id']) {
            $cmsNavMenuItem->name = Webpage::find($validatedData['webpage_id'])->name;
        } else {
            $cmsNavMenuItem->name = $validatedData['name'];
        }

        $cmsNavMenuItem->type = $validatedData['o_type'];
        // $cmsNavMenuItem->type = 'item';

        $cmsNavMenuItem->order = $this->getHighestMenuItemOrder() + 1;

        $cmsNavMenuItem->save();

        $this->dispatch('cmsNavMenuItemAdded');
    }

    public function getHighestMenuItemOrder()
    {
        if ($this->cmsNavMenu->cmsNavMenuItems) {
            return $this->cmsNavMenu->cmsNavMenuItems()->max('order');
        } else {
            return 0;
        } 
    }
}
