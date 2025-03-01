<?php

namespace App\Livewire\Testimonial\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class TestimonialDisplay extends Component
{
    public $testimonial;

    public function render(): View
    {
        return view('livewire.testimonial.dashboard.testimonial-display');
    }
}
