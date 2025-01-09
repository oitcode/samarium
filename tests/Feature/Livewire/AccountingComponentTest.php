<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\Accounting\AccountingComponent;
use Tests\TestCase;

use App\User;
 
class AccountingComponentTest extends TestCase
{
    /** @test */
    public function component_exists_on_the_page()
    {
        $user = User::where('role', 'admin')->first();

        $this->actingAs($user)
            ->get('/dashboard/accounting')
            ->assertSeeLivewire(AccountingComponent::class);
    }
}
