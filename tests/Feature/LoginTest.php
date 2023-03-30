<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * Test that login page is available.
     *
     * @return void
     */
    public function testLoginPageIsAvailable()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    /**
     * Test that guest (users that have not logged in) are redirected
     * to login page when they try to access the dashboard.
     *
     * @return void
     */
    public function test_guest_users_redirect_to_login_instead_of_dashboard()
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect('/login');
    }
}
