<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\Inventory\InventoryComponent;
use Tests\TestCase;

use App\User;
 
class InventoryComponentTest extends TestCase
{
    public function test_component_exists_on_the_page()
    {
        $user = User::where('role', 'admin')->first();;

        $this->actingAs($user)
            ->get('/dashboard/inventory')
            ->assertSeeLivewire(InventoryComponent::class);
    }
}
