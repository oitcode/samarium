<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\Report\ReportComponent;
use Tests\TestCase;

use App\User;
 
class ReportComponentTest extends TestCase
{
    /** @test */
    public function component_exists_on_the_page()
    {
        $user = User::where('role', 'admin')->first();

        $this->actingAs($user)
            ->get('/dashboard/report')
            ->assertSeeLivewire(ReportComponent::class);
    }
}
