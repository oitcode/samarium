<?php

namespace App\Livewire\Testimonial\Dashboard;

use Livewire\Component;

class TestimonialDisplay extends Component
{
    public $testimonial;

    public function render()
    {
        return view('livewire.testimonial.dashboard.testimonial-display');
    }
}
