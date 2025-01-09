<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\RecordBook\WeekbookComponent;
use Tests\TestCase;

use App\User;
 
class WeekbookComponentTest extends TestCase
{
    /** @test */
    public function component_exists_on_the_page()
    {
        $user = User::where('role', 'admin')->first();

        $this->actingAs($user)
            ->get('/dashboard/weekbook')
            ->assertSeeLivewire(WeekbookComponent::class);
    }
}
