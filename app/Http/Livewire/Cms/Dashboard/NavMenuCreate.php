<?php

namespace App\Http\Livewire\Cms\Dashboard;

use Livewire\Component;

use App\CmsNavMenu;

class NavMenuCreate extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.cms.dashboard.nav-menu-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
        ]);

        CmsNavMenu::create($validatedData);

        $this->emit('cmsNavMenuAdded');
    }
}
