<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\Testimonial\Dashboard\TestimonialComponent;
use Tests\TestCase;

use App\User;
 
class TestimonialComponentTest extends TestCase
{
    /** @test */
    public function component_exists_on_the_page()
    {
        $user = User::where('role', 'admin')->first();

        $this->actingAs($user)
            ->get('/dashboard/testimonial')
            ->assertSeeLivewire(TestimonialComponent::class);
    }
}
