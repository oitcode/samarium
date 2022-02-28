<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\WebsiteOrder;

class WebsiteHeroOrder extends Component
{
    public $phone;
    public $address;

    public $modes = [
        'showForm' => false,
    ];

    public function render()
    {
        return view('livewire.website-hero-order');
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
