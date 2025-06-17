<?php

namespace App\Livewire\Testimonial\Website;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\Testimonial\Testimonial;

class TestimonialList extends Component
{
    public $testimonials;

    public function render(): View
    {
        $this->testimonials = Testimonial::all();

        return view('livewire.testimonial.website.testimonial-list');
    }
}
