<?php

namespace App\Livewire\UrlLink\Dashboard;

use Livewire\Component;

use App\Traits\ModesTrait;

use App\UrlLink;

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

    public function render()
    {
        return view('livewire.url-link.dashboard.url-link-component');
    }

    public function urlLinkCreateCancelled()
    {
        $this->exitMode('create');
    }

    public function urlLinkCreateCompleted()
    {
        $this->exitMode('create');
    }

    public function displayUrlLink(UrlLink $urlLink)
    {
        $this->displayingUrlLink = $urlLink;
        $this->enterMode('display');
    }

    public function exitUrlLinkDisplay()
    {
        $this->displayingUrlLink = null;
        $this->exitMode('display');
    }
}
