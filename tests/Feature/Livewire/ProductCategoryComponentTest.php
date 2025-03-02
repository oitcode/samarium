<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\ProductCategory\ProductCategoryComponent;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ProductCategoryComponentTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function component_exists_on_the_page()
    {
        User::factory()->create([]);

        $user = User::where('role', 'admin')->first();

        $this->actingAs($user)
            ->get('/dashboard/product-category')
            ->assertSeeLivewire(ProductCategoryComponent::class);
    }
}
