<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\ProductCategory\ProductCategoryComponent;
use Tests\TestCase;

use App\User;
 
class ProductCategoryComponentTest extends TestCase
{
    /** @test */
    public function component_exists_on_the_page()
    {
        $user = User::where('role', 'admin')->first();;

        $this->actingAs($user)
            ->get('/dashboard/product-category')
            ->assertSeeLivewire(ProductCategoryComponent::class);
    }
}
