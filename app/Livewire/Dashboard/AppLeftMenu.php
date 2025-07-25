<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Support\Facades\Request;
use App\Traits\ModesTrait;

class AppLeftMenu extends Component
{
    use ModesTrait;

    public $modes = [
        'product' => false,
        'shop' => false,
        'cms' => false,
        'calendar' => false,
        'bgc' => false,
        'team' => false,
        'report' => false,
        'crm' => false,
        'hr' => false,
        'project' => false,
        'document' => false,
        'educ' => false,
        'accounting' => false,
        'more' => false,
    ];

    public function mount(): void
    {
        $uri = Request::getPathInfo();

        if (
            $uri == '/dashboard/product' ||
            $uri == '/dashboard/product-category' ||
            $uri == '/dashboard/product-question' ||
            $uri == '/dashboard/product-vendor' ||
            $uri == '/dashboard/inventory'
        ) {
            $this->enterModeSilent('product');
        } else if (
            $uri == '/dashboard/sale' ||
            $uri == '/dashboard/cafesale' ||
            $uri == '/dashboard/purchase' ||
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
            $uri == '/dashboard/calendar/calendar' ||
            $uri == '/dashboard/calendar/calendar-group'
        ) {
            $this->enterModeSilent('calendar');
        } else if (
            $uri == '/dashboard/customer' ||
            $uri == '/dashboard/vendor' ||
            $uri == '/dashboard/contact-form' ||
            $uri == '/dashboard/appointment' ||
            $uri == '/dashboard/newsletter-subscription' ||
            $uri == '/dashboard/testimonial'
        ) {
            $this->enterModeSilent('crm');
        } else if (
            $uri == '/dashboard/vacancy'
        ) {
            $this->enterModeSilent('hr');
        } else if (
            $uri == '/dashboard/todo'
        ) {
            $this->enterModeSilent('project');
        } else if (
            $uri == '/dashboard/document/url-link' ||
            $uri == '/dashboard/document/file'
        ) {
            $this->enterModeSilent('document');
        } else if (
            $uri == '/dashboard/accounting'
        ) {
            $this->enterModeSilent('accounting');
        } else if (
            $uri == '/dashboard/company' ||
            $uri == '/dashboard/users' ||
            $uri == '/dashboard/settings'
        ) {
            $this->enterModeSilent('more');
        }
    }

    public function render(): View
    {
        return view('livewire.dashboard.app-left-menu');
    }
}
