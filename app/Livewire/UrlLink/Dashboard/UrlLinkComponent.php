<?php

namespace App\Livewire\UrlLink\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use App\Models\UrlLink\UrlLink;

class UrlLinkComponent extends Component
{
    use ModesTrait;

    public $displayingUrlLink;

    public $modes = [
        'create' => false,
        'list' => false,
        'display' => false,
    ];

    protected $listeners = [
        'urlLinkCreateCancelled',
        'urlLinkCreateCompleted',
        'displayUrlLink',
        'exitUrlLinkDisplay',
    ];

    public function render(): View
    {
        return view('livewire.url-link.dashboard.url-link-component');
    }

    public function urlLinkCreateCancelled(): void
    {
        $this->exitMode('create');
    }

    public function urlLinkCreateCompleted(): void
    {
        $this->exitMode('create');
    }

    public function displayUrlLink(int $urlLinkId): void
    {
        $this->displayingUrlLink = UrlLink::find($urlLinkId);
        $this->enterMode('display');
    }

    public function exitUrlLinkDisplay(): void
    {
        $this->displayingUrlLink = null;
        $this->exitMode('display');
    }
}
