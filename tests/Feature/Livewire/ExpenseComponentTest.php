<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\Expense\ExpenseComponent;
use Tests\TestCase;

use App\User;
 
class ExpenseComponentTest extends TestCase
{
    public function test_component_exists_on_the_page()
    {
        $user = User::where('role', 'admin')->first();;

        $this->actingAs($user)
            ->get('/dashboard/expense')
            ->assertSeeLivewire(ExpenseComponent::class);
    }
}
