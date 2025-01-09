<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\Vacancy\Dashboard\VacancyComponent;
use Tests\TestCase;

use App\User;
 
class VacancyComponentTest extends TestCase
{
    /** @test */
    public function component_exists_on_the_page()
    {
        $user = User::where('role', 'admin')->first();

        $this->actingAs($user)
            ->get('/dashboard/vacancy')
            ->assertSeeLivewire(VacancyComponent::class);
    }
}
