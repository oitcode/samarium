<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\Company\Dashboard\CompanyComponent;
use Tests\TestCase;

use App\User;
 
class CompanyComponentTest extends TestCase
{
    public function test_component_exists_on_the_page()
    {
        $user = User::where('role', 'admin')->first();

        $this->actingAs($user)
            ->get('/dashboard/company')
            ->assertSeeLivewire(CompanyComponent::class);
    }
}
