<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\CafeSale\CafeSaleComponent;
use Tests\TestCase;

use App\User;
 
class CafeSaleComponentTest extends TestCase
{
    public function test_component_exists_on_the_page()
    {
        $user = User::where('role', 'admin')->first();;

        $this->actingAs($user)
            ->get('/dashboard/cafesale')
            ->assertSeeLivewire(CafeSaleComponent::class);
    }
}
