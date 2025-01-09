<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\OnlineOrder\Dashboard\OnlineOrderComponent;
use Tests\TestCase;

use App\User;
 
class OnlineOrderComponentTest extends TestCase
{
    /** @test */
    public function component_exists_on_the_page()
    {
        $user = User::where('role', 'admin')->first();;

        $this->actingAs($user)
            ->get('/dashboard/onlineorder')
            ->assertSeeLivewire(OnlineOrderComponent::class);
    }
}
