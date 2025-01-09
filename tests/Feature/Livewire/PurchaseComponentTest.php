<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\Purchase\PurchaseComponent;
use Tests\TestCase;

use App\User;
 
class PurchaseComponentTest extends TestCase
{
    /** @test */
    public function component_exists_on_the_page()
    {
        $user = User::where('role', 'admin')->first();;

        $this->actingAs($user)
            ->get('/dashboard/purchase')
            ->assertSeeLivewire(PurchaseComponent::class);
    }
}
