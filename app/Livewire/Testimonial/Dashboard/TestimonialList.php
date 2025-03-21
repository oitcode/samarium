<?php

namespace App\Livewire\Testimonial\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Testimonial;

class TestimonialList extends Component
{
    use WithPagination;

    // public $testimonials;
    public $testimonialsCount;

    public function render(): View
    {
        $this->testimonialsCount = Testimonial::count();

        $testimonials = Testimonial::orderBy('testimonial_id', 'DESC')->paginate(5);

        return view('livewire.testimonial.dashboard.testimonial-list')
            ->with('testimonials', $testimonials);
    }
}
