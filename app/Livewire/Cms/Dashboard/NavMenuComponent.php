<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use App\CmsNavMenu;

class NavMenuComponent extends Component
{
    use ModesTrait;

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

    public function mount(): void
    {
        if (CmsNavMenu::first()) {
            $this->displayingCmsNavMenu = CmsNavMenu::first();
            $this->enterMode('display');
        }
    }

    public function render(): View
    {
        return view('livewire.cms.dashboard.nav-menu-component');
    }

    public function cmsNavMenuAdded(): void
    {
        session()->flash('message', 'Nav menu created');
        $this->exitMode('create');
    }

    public function exitCreateMode(): void
    {
        $this->exitMode('create');
    }

    public function displayCmsNavMenu($cmsNavMenuId): void
    {
        $cmsNavMenu = CmsNavMenu::find($cmsNavMenuId);

        $this->displayingCmsNavMenu = $cmsNavMenu;

        $this->enterMode('display');
    }
}
