<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\Customer\CustomerComponent;
use Tests\TestCase;

use App\User;
 
class CustomerComponentTest extends TestCase
{
    public function test_component_exists_on_the_page()
    {
        $user = User::where('role', 'admin')->first();;

        $this->actingAs($user)
            ->get('/dashboard/customer')
            ->assertSeeLivewire(CustomerComponent::class);
    }
}
