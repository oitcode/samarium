<?php

namespace App\Http\Livewire\Cms;

use Livewire\Component;

use App\Webpage;
use App\CmsNavMenuDropdownItem;

class NavMenuDisplayNavMenuDropdownItemCreate extends Component
{
    public $cmsNavMenuItem;

    public $webpages;

    public $name;
    public $webpage_id;

    public function render()
    {
        $this->webpages = Webpage::all();

        return view('livewire.cms.nav-menu-display-nav-menu-dropdown-item-create');
    }

    public function store()
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

        $this->emit('cmsNavMenuDropdownItemAdded');
    }

    public function getHighestMenuDropdownItemOrder()
    {
        if ($this->cmsNavMenuItem->cmsNavMenuDropdownItems) {
            return $this->cmsNavMenuItem->cmsNavMenuDropdownItems()->max('order');
        } else {
            return 0;
        } 
    }
}
