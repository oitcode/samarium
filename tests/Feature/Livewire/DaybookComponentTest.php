<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\RecordBook\DaybookComponent;
use Tests\TestCase;

use App\User;
 
class DaybookComponentTest extends TestCase
{
    /** @test */
    public function component_exists_on_the_page()
    {
        $user = User::where('role', 'admin')->first();

        $this->actingAs($user)
            ->get('/dashboard/daybook')
            ->assertSeeLivewire(DaybookComponent::class);
    }
}
