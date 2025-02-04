<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\Calendar\Dashboard\CalendarGroupComponent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

use App\User;
 
class CalendarGroupComponentTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function component_exists_on_the_page()
    {
        User::factory()->create([]);

        $user = User::where('role', 'admin')->first();

        $this->actingAs($user)
            ->get('/dashboard/calendar/calendar-group')
            ->assertSeeLivewire(CalendarGroupComponent::class);
    }
}
