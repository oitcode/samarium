<?php

namespace App\Livewire\EcommWebsite;

use Livewire\Component;
use Illuminate\View\View;
use App\Webpage;

class Menu extends Component
{
    public $webpages;

    public function render(): View
    {
        $this->webpages = Webpage::all();

        return view('livewire.ecomm-website.menu');
    }
}
