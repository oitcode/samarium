<?php

namespace App\Livewire\Cms\Website;

use Livewire\Component;

class WebpageDisplay extends Component
{
    public $webpage;

    public function render()
    {
        $this->webpage->website_views = $this->webpage->website_views + 1;
        $this->webpage->save();

        return view('livewire.cms.website.webpage-display');
    }
}
