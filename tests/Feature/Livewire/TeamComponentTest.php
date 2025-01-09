<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\Team\TeamComponent;
use Tests\TestCase;

use App\User;
 
class TeamComponentTest extends TestCase
{
    /** @test */
    public function component_exists_on_the_page()
    {
        $user = User::where('role', 'admin')->first();

        $this->actingAs($user)
            ->get('/dashboard/team')
            ->assertSeeLivewire(TeamComponent::class);
    }
}
