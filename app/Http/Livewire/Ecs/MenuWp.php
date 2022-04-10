<?php

namespace App\Http\Livewire\Ecs;

use Livewire\Component;

use App\CmsNavMenu;

class MenuWp extends Component
{
    public $cmsNavMenu;

    public function render()
    {
        $this->cmsNavMenu = CmsNavMenu::first();

        return view('livewire.ecs.menu-wp');
    }
}
