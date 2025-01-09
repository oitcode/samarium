<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\UrlLink\Dashboard\UrlLinkComponent;
use Tests\TestCase;

use App\User;
 
class UrlLinkComponentTest extends TestCase
{
    /** @test */
    public function component_exists_on_the_page()
    {
        $user = User::where('role', 'admin')->first();

        $this->actingAs($user)
            ->get('/dashboard/document/url-link')
            ->assertSeeLivewire(UrlLinkComponent::class);
    }
}
