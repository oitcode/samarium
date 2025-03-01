<?php

namespace App\Livewire\EcommWebsite;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use App\WebsiteOrder;

class HeroOrder extends Component
{
    use ModesTrait;

    public $phone;
    public $address;

    public $modes = [
        'showForm' => false,
    ];

    public function render(): View
    {
        return view('livewire.ecomm-website.hero-order');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'phone' => 'required',
            'address' => 'nullable',
        ]);

        WebsiteOrder::create($validatedData);

        $this->exitMode('showForm');
    }
}
