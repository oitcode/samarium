<?php

namespace App\Livewire\Dashboard;

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
        'hr' => false,
        'project' => false,
        'document' => false,
        'educ' => false,
    ];

    public function mount()
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
            $uri == '/dashboard/customer' ||
            $uri == '/dashboard/purchase' ||
            $uri == '/dashboard/vendor' ||
            $uri == '/dashboard/expense' ||
            $uri == '/dashboard/onlineorder' ||
            $uri == '/dashboard/accounting' ||
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
            $uri == '/dashboard/school/calendar' ||
            $uri == '/dashboard/calendar/calendar-group'
        ) {
            $this->enterModeSilent('school');
        } else if (
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
        }
    }

    public function render()
    {
        return view('livewire.dashboard.app-left-menu');
    }
}
