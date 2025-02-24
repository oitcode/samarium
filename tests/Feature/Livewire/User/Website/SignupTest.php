<?php

namespace Tests\Feature\Livewire\User\Website;

use App\Livewire\User\Website\Signup;
use Tests\TestCase;

class SignupTest extends TestCase
{
    public function test_component_exists_on_page()
    {
        $this->get('/user/signup')
            ->assertStatus(200)
            ->assertSeeLivewire(Signup::class);
    }

    public function test_user_can_sign_up()
    {
        $this->assertTrue(true);

        // todo: need to do perform actual test.
    }
}
