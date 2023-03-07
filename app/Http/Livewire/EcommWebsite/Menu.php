<?php

namespace App\Http\Livewire\EcommWebsite;

use Livewire\Component;

use App\Webpage;

class Menu extends Component
{
    public $webpages;

    public function render()
    {
        $this->webpages = Webpage::all();

        return view('livewire.ecomm-website.menu');
    }
}
