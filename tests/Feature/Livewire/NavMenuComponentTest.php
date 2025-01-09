<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\Cms\Dashboard\NavMenuComponent;
use Tests\TestCase;

use App\User;
 
class NavMenuComponentTest extends TestCase
{
    /** @test */
    public function component_exists_on_the_page()
    {
        $user = User::where('role', 'admin')->first();

        $this->actingAs($user)
            ->get('/cms/navMenu')
            ->assertSeeLivewire(NavMenuComponent::class);
    }
}
