<?php

namespace App\Livewire\EcommWebsite;

use Livewire\Component;
use Illuminate\View\View;

class HomeSearchResult extends Component
{
    public $products;

    public function render(): View
    {
        return view('livewire.ecomm-website.home-search-result');
    }
}
