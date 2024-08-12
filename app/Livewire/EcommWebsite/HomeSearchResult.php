<?php

namespace App\Livewire\EcommWebsite;

use Livewire\Component;

class HomeSearchResult extends Component
{
    public $products;

    public function render()
    {
        return view('livewire.ecomm-website.home-search-result');
    }
}
