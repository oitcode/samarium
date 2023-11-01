<?php

namespace App\Http\Livewire\Testimonial\Website;

use Livewire\Component;

use App\Testimonial;

class TestimonialList extends Component
{
    public $testimonials;

    public function render()
    {
        $this->testimonials = Testimonial::all();

        return view('livewire.testimonial.website.testimonial-list');
    }
}
