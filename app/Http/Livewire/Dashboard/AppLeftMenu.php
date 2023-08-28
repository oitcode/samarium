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
        'school' => false,
        'bgc' => false,
        'team' => false,
        'report' => false,
    ];

    public function mount()
    {
        $uri = Request::getPathInfo();

        if (
            $uri == '/dashboard/sale' ||
            $uri == '/dashboard/cafesale' ||
            $uri == '/dashboard/customer' ||
            $uri == '/dashboard/purchase' ||
            $uri == '/dashboard/vendor' ||
            $uri == '/dashboard/expense' ||
            $uri == '/dashboard/menu' ||
            $uri == '/dashboard/onlineorder' ||
            $uri == '/dashboard/inventory'
        ) {
            $this->enterModeSilent('shop');
        } else if (
            $uri == '/cms' ||
            $uri == '/cms/webpage' ||
            $uri == '/cms/post' ||
            $uri == '/cms/navMenu' ||
            $uri == '/cms/theme' ||
            $uri == '/cms/gallery'
        ) {
            $this->enterModeSilent('cms');
        } else if (
            $uri == '/dashboard/report' ||
            $uri == '/dashboard/daybook' ||
            $uri == '/dashboard/weekbook'
        ) {
            $this->enterModeSilent('report');
        } else if (
            $uri == '/dashboard/team' ||
            $uri == '/dashboard/quick-contacts'
        ) {
            $this->enterModeSilent('team');
        } else if (
            $uri == '/dashboard/school/calendar'
        ) {
            $this->enterModeSilent('school');
        }
    }

    public function render()
    {
        return view('livewire.dashboard.app-left-menu');
    }
}
