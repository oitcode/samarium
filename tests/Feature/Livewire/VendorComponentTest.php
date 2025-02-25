<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\Vendor\VendorComponent;
use Tests\TestCase;

use App\User;
 
class VendorComponentTest extends TestCase
{
    public function test_component_exists_on_the_page()
    {
        $user = User::where('role', 'admin')->first();;

        $this->actingAs($user)
            ->get('/dashboard/vendor')
            ->assertSeeLivewire(VendorComponent::class);
    }
}
