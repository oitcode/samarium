<?php

namespace App\Http\Livewire\Cms\Dashboard;

use Livewire\Component;

use App\CmsNavMenu;

class NavMenuComponent extends Component
{
    public $displayingCmsNavMenu;

    public $modes = [
        'create' =>false,
        'display' =>false,
        'list' => true,
    ];

    protected $listeners = [
        'cmsNavMenuAdded',
        'exitCreateMode',
        'displayCmsNavMenu',
    ];

    public function mount()
    {
        if (CmsNavMenu::first()) {
            $this->displayingCmsNavMenu = CmsNavMenu::first();
            $this->enterMode('display');
        }
    }

    public function render()
    {
        return view('livewire.cms.dashboard.nav-menu-component');
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
        session()->flash('message', 'Nav menu created');
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
