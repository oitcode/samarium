<?php

namespace App\Livewire\Testimonial\Website;

use Livewire\Component;
use Illuminate\View\View;
use App\Testimonial;

class TestimonialCreate extends Component
{
    public $writer_name;
    public $writer_info;
    public $body;

    public function render(): View
    {
        return view('livewire.testimonial.website.testimonial-create');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'writer_name' => 'nullable',
            'writer_info' => 'nullable',
            'body' => 'required',
        ]);

        Testimonial::create($validatedData);

        $this->resetInputFields();
    }

    public function resetInputFields(): void
    {
        $this->writer_name = '';
        $this->writer_info = '';
        $this->body = '';
    }
}
