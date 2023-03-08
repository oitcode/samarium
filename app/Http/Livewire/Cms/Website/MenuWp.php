<?php

namespace App\Http\Livewire\Cms\Website;

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

        return view('livewire.cms.website.menu-wp')
            ->with('company', $company);
    }
}
