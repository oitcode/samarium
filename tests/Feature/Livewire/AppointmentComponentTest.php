<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\Appointment\Dashboard\AppointmentComponent;
use Tests\TestCase;

use App\User;
 
class AppointmentComponentTest extends TestCase
{
    /** @test */
    public function component_exists_on_the_page()
    {
        $user = User::where('role', 'admin')->first();

        $this->actingAs($user)
            ->get('/dashboard/appointment')
            ->assertSeeLivewire(AppointmentComponent::class);
    }
}