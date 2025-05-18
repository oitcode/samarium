<?php

namespace App\Livewire\Testimonial\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Traits\ModesTrait;
use App\Services\Testimonial\TestimonialService;
use App\Testimonial;

/**
 * TestimonialList Component
 * 
 * This Livewire component handles the listing of testimonials.
 * It also handles deletion of testimonials.
 */
class TestimonialList extends Component
{
    use WithPagination;
    use ModesTrait;

    /**
     * Testimonials per pagination
     *
     * @var int
     */
    public $perPage = 5;

    /**
     * Total count of testimonials
     *
     * @var int
     */
    public $totalTestimonialCount;

    /**
     * Testimonial which needs to be deleted
     *
     * @var Testimonial
     */
    public $deletingTestimonial;

    /**
     * Component display modes
     *
     * @var array
     */
    public $modes = [
        'confirmDelete' => false, 
        'cannotDelete' => false, 
    ];

    /**
     * Render the component
     *
     * @return \Illuminate\View\View
     */
    public function render(TestimonialService $testimonialService): View
    {
        $testimonials = $testimonialService->getPaginatedTestimonials($this->perPage);
        $this->totalTestimonialCount = $testimonialService->getTotalTestimonialCount();

        return view('livewire.testimonial.dashboard.testimonial-list', [
            'testimonials' => $testimonials,
        ]);
    }

    /**
     * Confirm if user really wants to delete a testomonial
     *
     * @return void
     */
    public function confirmDeleteTestimonial(int $testimonial_id, TestimonialService $testomonialService): void
    {
        $this->deletingTestimonial = Testimonial::find($testimonial_id);

        if ($testomonialService->canDeleteTestimonial($testimonial_id)) {
            $this->enterModeSilent('confirmDelete');
        } else {
            $this->enterModeSilent('cannotDelete');
        }
    }

    /**
     * Cancel testomonial delete
     *
     * @return void
     */
    public function cancelDeleteTestimonial(): void
    {
        $this->deletingTestimonial = null;
        $this->exitMode('confirmDelete');
    }

    /**
     * Turn off the mode that shows that an testomonial cannot be deleted
     *
     * @return void
     */
    public function cancelCannotDeleteTestimonial(): void
    {
        $this->deletingTestimonial = null;
        $this->exitMode('cannotDelete');
    }

    /**
     * Delete testomonial
     *
     * @return void
     */
    public function deleteTestimonial(TestimonialService $testomonialService): void
    {
        $testomonialService->deleteTestimonial($this->deletingTestimonial->testimonial_id);
        $this->deletingTestimonial = null;
        $this->exitMode('confirmDelete');
    }
}
