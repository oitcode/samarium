<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\Cms\Webpage\Webpage;
use App\Models\Cms\CmsNavMenu\CmsNavMenuDropdownItem;

class NavMenuDisplayNavMenuDropdownItemCreate extends Component
{
    public $cmsNavMenuItem;

    public $webpages;

    public $name;
    public $webpage_id;

    public function render(): View
    {
        $this->webpages = Webpage::all();

        return view('livewire.cms.dashboard.nav-menu-display-nav-menu-dropdown-item-create');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'webpage_id' => 'required|integer',
        ]);

        $cmsNavMenuDropdownItem = new CmsNavMenuDropdownItem;

        $cmsNavMenuDropdownItem->cms_nav_menu_item_id = $this->cmsNavMenuItem->cms_nav_menu_item_id;
        $cmsNavMenuDropdownItem->order = $this->getHighestMenuDropdownItemOrder() + 1;
        $cmsNavMenuDropdownItem->name = $validatedData['name'];
        $cmsNavMenuDropdownItem->webpage_id = $validatedData['webpage_id'];

        $cmsNavMenuDropdownItem->save();

        $this->dispatch('cmsNavMenuDropdownItemAdded');
    }

    public function getHighestMenuDropdownItemOrder(): int
    {
        if (count($this->cmsNavMenuItem->cmsNavMenuDropdownItems) > 0) {
            return $this->cmsNavMenuItem->cmsNavMenuDropdownItems()->max('order');
        } else {
            return 0;
        } 
    }
}
