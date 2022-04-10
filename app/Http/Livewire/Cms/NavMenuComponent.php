<?php

namespace App\Http\Livewire\Cms;

use Livewire\Component;

use App\CmsNavMenu;

class NavMenuComponent extends Component
{
    public $displayingCmsNavMenu;

    public $modes = [
        'create' =>false,
        'display' =>false,
    ];

    protected $listeners = [
        'cmsNavMenuAdded',
        'exitCreateMode',
        'displayCmsNavMenu',
    ];

    public function render()
    {
        return view('livewire.cms.nav-menu-component');
    }

    /* Clear modes */
    public function clearModes()
    {
        foreach ($this->modes as $key => $val) {
            $this->modes[$key] = false;
        }
    }

    /* Enter and exit mode */
    public function enterMode($modeName)
    {
        $this->clearModes();

        $this->modes[$modeName] = true;
    }

    public function exitMode($modeName)
    {
        $this->modes[$modeName] = false;
    }

    public function cmsNavMenuAdded()
    {
        $this->exitMode('create');
    }

    public function exitCreateMode()
    {
        $this->exitMode('create');
    }

    public function displayCmsNavMenu($cmsNavMenuId)
    {
        $cmsNavMenu = CmsNavMenu::find($cmsNavMenuId);

        $this->displayingCmsNavMenu = $cmsNavMenu;

        $this->enterMode('display');
    }
}
