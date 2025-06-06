<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\School\CalendarComponent;
use Tests\TestCase;

use App\User;
 
class CalendarComponentTest extends TestCase
{
    public function test_component_exists_on_the_page()
    {
        $user = User::where('role', 'admin')->first();

        $this->actingAs($user)
            ->get('/dashboard/school/calendar')
            ->assertSeeLivewire(CalendarComponent::class);
    }
}
