<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\ContactForm\Dashboard\ContactFormComponent;
use Tests\TestCase;

use App\User;
 
class ContactFormComponentTest extends TestCase
{
    public function test_component_exists_on_the_page()
    {
        $user = User::where('role', 'admin')->first();

        $this->actingAs($user)
            ->get('/dashboard/contact-form')
            ->assertSeeLivewire(ContactFormComponent::class);
    }
}
