<?php

namespace App\Livewire\Testimonial\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use App\Models\Testimonial\Testimonial;

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
        'exitTestimonialDisplay',
    ];

    public function render(): View
    {
        return view('livewire.testimonial.dashboard.testimonial-component');
    }

    public function displayTestimonial($testimonialId): void
    {
        $this->displayingTestimonial = Testimonial::find($testimonialId);

        $this->enterMode('displayTestimonialMode');
    }

    public function exitTestimonialDisplay(): void
    {
        $this->displayingTestimonial = null;
        $this->exitMode('displayTestimonialMode');
    }
}
