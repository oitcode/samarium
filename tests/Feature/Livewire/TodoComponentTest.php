<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\Todo\Dashboard\TodoComponent;
use Tests\TestCase;

use App\User;
 
class TodoComponentTest extends TestCase
{
    /** @test */
    public function component_exists_on_the_page()
    {
        $user = User::where('role', 'admin')->first();

        $this->actingAs($user)
            ->get('/dashboard/todo')
            ->assertSeeLivewire(TodoComponent::class);
    }
}
