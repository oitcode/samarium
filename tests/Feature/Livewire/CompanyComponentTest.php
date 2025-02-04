<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\Company\Dashboard\CompanyComponent;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CompanyComponentTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function component_exists_on_the_page()
    {
        User::factory()->create([]);

        $user = User::where('role', 'admin')->first();

        $this->actingAs($user)
            ->get('/dashboard/company')
            ->assertSeeLivewire(CompanyComponent::class);
    }
}
