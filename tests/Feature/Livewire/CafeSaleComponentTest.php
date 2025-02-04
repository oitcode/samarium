<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\CafeSale\CafeSaleComponent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

use App\User;
 
class CafeSaleComponentTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function component_exists_on_the_page()
    {
        User::factory()->create([]);

        $user = User::where('role', 'admin')->first();

        $this->actingAs($user)
            ->get('/dashboard/cafesale')
            ->assertSeeLivewire(CafeSaleComponent::class);
    }
}
