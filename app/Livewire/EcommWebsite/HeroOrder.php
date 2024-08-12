<?php

namespace App\Livewire\EcommWebsite;

use Livewire\Component;

use App\WebsiteOrder;

class HeroOrder extends Component
{
    public $phone;
    public $address;

    public $modes = [
        'showForm' => false,
    ];

    public function render()
    {
        return view('livewire.ecomm-website.hero-order');
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

    public function store()
    {
        $validatedData = $this->validate([
            'phone' => 'required',
            'address' => 'nullable',
        ]);

        WebsiteOrder::create($validatedData);

        $this->exitMode('showForm');
    }
}
