<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

use Illuminate\Support\Facades\Request;

use App\Traits\ModesTrait;

class AppLeftMenu extends Component
{
    use ModesTrait;

    public $modes = [
        'shop' => false,
        'cms' => false,
        'bgc' => false,
    ];

    public function mount()
    {
        $uri = Request::getPathInfo();

        if (
            $uri == '/dashboard/sale' ||
            $uri == '/dashboard/customer' ||
            $uri == '/dashboard/purchase' ||
            $uri == '/dashboard/vendor' ||
            $uri == '/dashboard/expense' ||
            $uri == '/dashboard/menu' ||
            $uri == '/dashboard/daybook' ||
            $uri == '/dashboard/weekbook' ||
            $uri == '/dashboard/onlineorder' ||
            $uri == '/dashboard/report' ||
            $uri == '/dashboard/inventory'
        ) {
            $this->enterModeSilent('shop');
        } else if (
            $uri == '/cms' ||
            $uri == '/cms/webpage' ||
            $uri == '/cms/post' ||
            $uri == '/cms/navMenu' ||
            $uri == '/cms/gallery' ||
            $uri == '/dashboard/team' ||
            $uri == '/dashboard/quick-contacts'
        ) {
            $this->enterModeSilent('cms');
        }
    }

    public function render()
    {
        return view('livewire.dashboard.app-left-menu');
    }
}
