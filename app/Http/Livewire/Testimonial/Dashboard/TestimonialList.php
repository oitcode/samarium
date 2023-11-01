<?php

namespace App\Http\Livewire\Testimonial\Dashboard;

use Livewire\Component;

use App\Testimonial;

class TestimonialList extends Component
{
    public $testimonials;
    public $testimonialsCount;

    public function render()
    {
        $this->testimonialsCount = Testimonial::count();

        $this->testimonials = Testimonial::all();

        return view('livewire.testimonial.dashboard.testimonial-list');
    }
}
