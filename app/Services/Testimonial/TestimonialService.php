<?php

namespace App\Services\Testimonial;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Testimonial;

class TestimonialService
{
    /**
     * Get paginated list of testimonials
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPaginatedTestimonials(int $perPage = 5): LengthAwarePaginator
    {
        return Testimonial::orderBy('testimonial_id', 'DESC')->paginate($perPage);
    }

    /**
     * Create a new testimonial
     *
     * @param array $data
     * @return Testimonial
     */
    public function createTestimonial(array $data): Testimonial
    {
        $testimonial = Testimonial::create($data);

        return $testimonial;
    }

    /**
     * Check if a testimonial can be deleted.
     *
     * @param int $testimonial_id
     * @return void
     */
    public function canDeleteTestimonial(int $testimonial_id): bool
    {
        $testimonial = Testimonial::find($testimonial_id);

        // Todo

        return true;
    }

    /**
     * Delete testimonial
     *
     * @param int $testimonial_id
     * @return void
     */
    public function deleteTestimonial(int $testimonial_id): void
    {
        $testimonial = Testimonial::find($testimonial_id);

        $testimonial->delete();
    }

    /**
     * Get total testimonial count
     *
     * @return int
     */
    public function getTotalTestimonialCount(): int
    {
        return Testimonial::count();
    }
}
