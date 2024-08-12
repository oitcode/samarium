<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;

use App\Webpage;

class WebpageComponent extends Component
{
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

    public function render()
    {
        return view('livewire.cms.dashboard.webpage-component');
    }

    /* Clear modes */
    public function clearModes()
    {
        foreach ($this->modes as $key => $val) {
            $this->modes[$key] = false;
        }
    }

    /* Enter and exit mode */
    public function enterMode($modeName)
    {
        $this->clearModes();

        $this->modes[$modeName] = true;
    }

    public function exitMode($modeName)
    {
        $this->modes[$modeName] = false;
    }

    public function webpageAdded()
    {
        session()->flash('message', 'Webpage created');
        $this->exitMode('create');
        $this->enterMode('list');
    }

    public function exitCreateMode()
    {
        $this->exitMode('create');
    }

    public function displayWebpage(Webpage $webpage)
    {
        $this->displayingWebpage = $webpage;

        $this->enterMode('display');
    }

    public function exitWebpageDisplayMode()
    {
        $this->displayingWebpage = null;
        $this->clearModes();
    }
}
