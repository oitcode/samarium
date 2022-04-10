<?php

namespace App\Http\Livewire\Cms;

use Livewire\Component;

class WebpageDisplay extends Component
{
    public $webpage;

    public $modes = [
        'createWebpageContent' =>false,
    ];

    protected $listeners = [
        'webpageContentAdded' => 'exitCreateWebpageContent',
        'exitCreateWebpageContent',
    ];

    public function render()
    {
        return view('livewire.cms.webpage-display');
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

    public function exitCreateWebpageContent()
    {
        $this->exitMode('createWebpageContent');
    }
}
