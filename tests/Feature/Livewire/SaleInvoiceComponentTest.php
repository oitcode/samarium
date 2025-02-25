<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\Sale\SaleInvoiceComponent;
use Tests\TestCase;

use App\User;
 
class SaleInvoiceComponentTest extends TestCase
{
    public function test_component_exists_on_the_page()
    {
        $user = User::where('role', 'admin')->first();;

        $this->actingAs($user)
            ->get('/dashboard/sale')
            ->assertSeeLivewire(SaleInvoiceComponent::class);
    }
}
