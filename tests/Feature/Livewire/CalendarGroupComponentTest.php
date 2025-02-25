<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\Calendar\Dashboard\CalendarGroupComponent;
use Tests\TestCase;

use App\User;
 
class CalendarGroupComponentTest extends TestCase
{
    public function test_component_exists_on_the_page()
    {
        $user = User::where('role', 'admin')->first();

        $this->actingAs($user)
            ->get('/dashboard/calendar/calendar-group')
            ->assertSeeLivewire(CalendarGroupComponent::class);
    }
}
