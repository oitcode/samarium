<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\Product\Dashboard\ProductQuestionComponent;
use Tests\TestCase;

use App\User;
 
class ProductQuestionComponentTest extends TestCase
{
    public function test_component_exists_on_the_page()
    {
        $user = User::where('role', 'admin')->first();;

        $this->actingAs($user)
            ->get('/dashboard/product-question')
            ->assertSeeLivewire(ProductQuestionComponent::class);
    }
}
