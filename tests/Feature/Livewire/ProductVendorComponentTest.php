<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\ProductVendor\Dashboard\ProductVendorComponent;
use Tests\TestCase;

use App\User;
 
class ProductVendorComponentTest extends TestCase
{
    public function test_component_exists_on_the_page()
    {
        $user = User::where('role', 'admin')->first();

        $this->actingAs($user)
            ->get('/dashboard/product-vendor')
            ->assertSeeLivewire(ProductVendorComponent::class);
    }
}
