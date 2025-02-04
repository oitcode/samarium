<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\Appointment\Dashboard\AppointmentComponent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

use App\User;
 
class AppointmentComponentTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function component_exists_on_the_page()
    {
        User::factory()->create([]);

        $user = User::where('role', 'admin')->first();

        $this->actingAs($user)
            ->get('/dashboard/appointment')
            ->assertSeeLivewire(AppointmentComponent::class);
    }
}
