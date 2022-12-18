<?php

namespace App\Http\Livewire\Ecs;

use Livewire\Component;

use App\CmsNavMenu;
use App\Company;

class MenuWp extends Component
{
    public $cmsNavMenu;

    public function render()
    {
        $this->cmsNavMenu = CmsNavMenu::first();

        $company = Company::first();

        return view('livewire.ecs.menu-wp')
            ->with('company', $company);
    }
}
