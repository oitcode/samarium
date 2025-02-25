<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\DocumentFile\Dashboard\DocumentFileComponent;
use Tests\TestCase;

use App\User;
 
class DocumentFileComponentTest extends TestCase
{
    public function test_component_exists_on_the_page()
    {
        $user = User::where('role', 'admin')->first();

        $this->actingAs($user)
            ->get('/dashboard/document/file')
            ->assertSeeLivewire(DocumentFileComponent::class);
    }
}
