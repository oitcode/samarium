<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\DocumentFile\Dashboard\DocumentFileComponent;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class DocumentFileComponentTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function component_exists_on_the_page()
    {
        User::factory()->create([]);

        $user = User::where('role', 'admin')->first();

        $this->actingAs($user)
            ->get('/dashboard/document/file')
            ->assertSeeLivewire(DocumentFileComponent::class);
    }
}
