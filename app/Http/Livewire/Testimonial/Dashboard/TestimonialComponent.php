<?php

namespace App\Http\Livewire\Testimonial\Dashboard;

use Livewire\Component;

use App\Traits\ModesTrait;

use App\Testimonial;

class TestimonialComponent extends Component
{
    use ModesTrait;

    public $displayingTestimonial;

    public $modes = [
        'listTestimonialMode' => true,
        'displayTestimonialMode' => false,
    ];

    public $listeners = [
        'displayTestimonial',
    ];

    public function render()
    {
        return view('livewire.testimonial.dashboard.testimonial-component');
    }

    public function displayTestimonial(Testimonial $testimonial)
    {
        $this->displayingTestimonial = $testimonial;

        $this->enterMode('displayTestimonialMode');
    }
}
