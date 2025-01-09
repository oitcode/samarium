<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\School\CalendarComponent;
use Tests\TestCase;

use App\User;
 
class ProductVendorComponentTest extends TestCase
{
    /** @test */
    public function component_exists_on_the_page()
    {
        $user = User::where('role', 'admin')->first();;

        $this->actingAs($user)
            ->get('/dashboard/product-vendor')
            ->assertSeeLivewire(ProductVendorComponent::class);
    }
}
