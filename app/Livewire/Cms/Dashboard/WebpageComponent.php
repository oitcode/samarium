<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use App\Webpage;

class WebpageComponent extends Component
{
    use ModesTrait;

    public $displayingWebpage = null;

    public $modes = [
        'create' =>false,
        'display' =>false,
        'list' => true,
    ];

    protected $listeners = [
        'webpageAdded',
        'exitCreateMode',
        'displayWebpage',
        'exitWebpageDisplayMode',
    ];

    public function render(): View
    {
        return view('livewire.cms.dashboard.webpage-component');
    }

    public function webpageAdded(): void
    {
        session()->flash('message', 'Webpage created');
        $this->exitMode('create');
        $this->enterMode('list');
    }

    public function exitCreateMode(): void
    {
        $this->exitMode('create');
    }

    public function displayWebpage(Webpage $webpage): void
    {
        $this->displayingWebpage = $webpage;

        $this->enterMode('display');
    }

    public function exitWebpageDisplayMode(): void
    {
        $this->displayingWebpage = null;
        $this->clearModes();
    }
}
