<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\Shop\Dashboard\SaleQuotationComponent;
use Tests\TestCase;

use App\User;
 
class SaleQuotationComponentTest extends TestCase
{
    public function test_component_exists_on_the_page()
    {
        $user = User::where('role', 'admin')->first();;

        $this->actingAs($user)
            ->get('/dashboard/sale-quotation')
            ->assertSeeLivewire(SaleQuotationComponent::class);
    }
}
