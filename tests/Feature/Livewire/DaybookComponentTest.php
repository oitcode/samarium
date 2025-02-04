<?php
 
namespace Tests\Feature\Livewire;

use App\User;
use App\Livewire\RecordBook\DaybookComponent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class DaybookComponentTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function component_exists_on_the_page()
    {
        User::factory()->create([]);

        $user = User::where('role', 'admin')->first();

        $this->actingAs($user)
            ->get('/dashboard/daybook')
            ->assertSeeLivewire(DaybookComponent::class);
    }
}
