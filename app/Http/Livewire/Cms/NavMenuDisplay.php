<?php

namespace App\Http\Livewire\Cms;

use Livewire\Component;

class NavMenuDisplay extends Component
{
    public $cmsNavMenu;

    public $modes = [
        'createNavMenuItem' =>false,
    ];

    protected $listeners = [
        'cmsNavMenuItemAdded',
        'exitCreateCmsNavMenuItemMode',
    ];

    public function render()
    {
        return view('livewire.cms.nav-menu-display');
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

    public function cmsNavMenuItemAdded()
    {
        $this->exitMode('createNavMenuItem');
    }

    public function exitCreateCmsNavMenuItemMode()
    {
        $this->exitMode('createNavMenuItem');
    }
}
