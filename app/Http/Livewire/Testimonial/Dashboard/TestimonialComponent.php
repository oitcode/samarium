<?php

namespace App\Http\Livewire\Testimonial\Dashboard;

use Livewire\Component;

use App\Traits\ModesTrait;


class TestimonialComponent extends Component
{
    use ModesTrait;

    public $modes = [
        'listTestimonialMode' => true,
        'displayTestimonialMode' => false,
    ];

    public function render()
    {
        return view('livewire.testimonial.dashboard.testimonial-component');
    }
}
