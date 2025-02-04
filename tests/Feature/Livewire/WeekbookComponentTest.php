<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\RecordBook\WeekbookComponent;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class WeekbookComponentTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function component_exists_on_the_page()
    {
        User::factory()->create([]);

        $user = User::where('role', 'admin')->first();

        $this->actingAs($user)
            ->get('/dashboard/weekbook')
            ->assertSeeLivewire(WeekbookComponent::class);
    }
}
