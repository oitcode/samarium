<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\UserProfile\ChangePasswordComponent;
use Tests\TestCase;

use App\User;
 
class ChangePasswordComponentTest extends TestCase
{
    /** @test */
    public function component_exists_on_the_page()
    {
        $user = User::where('role', 'admin')->first();;

        $this->actingAs($user)
            ->get('/dashboard/changePassword')
            ->assertSeeLivewire(ChangePasswordComponent::class);
    }
}
