<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

use Illuminate\Support\Facades\Request;

use App\Traits\ModesTrait;

class AppLeftMenu extends Component
{
    use ModesTrait;

    public $modes = [
        'product' => false,
        'shop' => false,
        'cms' => false,
        'school' => false,
        'bgc' => false,
        'team' => false,
        'report' => false,
        'crm' => false,
    ];

    public function mount()
    {
        $uri = Request::getPathInfo();

        if (
            $uri == '/dashboard/menu' ||
            $uri == '/dashboard/product-category' ||
            $uri == '/dashboard/inventory'
        ) {
            $this->enterModeSilent('product');
        } else if (
            $uri == '/dashboard/sale' ||
            $uri == '/dashboard/cafesale' ||
            $uri == '/dashboard/customer' ||
            $uri == '/dashboard/purchase' ||
            $uri == '/dashboard/vendor' ||
            $uri == '/dashboard/expense' ||
            $uri == '/dashboard/onlineorder' ||
            $uri == '/dashboard/sale-quotation'
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
        } else if (
            $uri == '/dashboard/contact-form' ||
            $uri == '/dashboard/appointment' ||
            $uri == '/dashboard/newsletter-subscription' ||
            $uri == '/dashboard/testimonial'
        ) {
            $this->enterModeSilent('crm');
        }
    }

    public function render()
    {
        return view('livewire.dashboard.app-left-menu');
    }
}
