<?php

namespace App\Livewire\Cms\Website;

use Livewire\Component;
use Illuminate\View\View;
use App\CmsNavMenu;
use App\Company;

class NavMenu extends Component
{
    public $cmsNavMenu;

    public function render(): View
    {
        $this->cmsNavMenu = CmsNavMenu::first();

        $company = Company::first();

        return view('livewire.cms.website.nav-menu')
            ->with('company', $company);
    }
}
