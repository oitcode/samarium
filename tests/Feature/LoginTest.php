<?php

namespace Tests\Feature;

use App\User;
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

    /**
     * Test that last_login_at is updated when a user successfully logs in.
     *
     * @return void
     */
    public function test_user_last_login_at_is_updated_after_successful_login(): void
    {
        $user = User::factory()->create([
            'last_login_at' => null,
        ]);

        $this->post('login', [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $user->refresh();

        $this->assertAuthenticatedAs($user);
        $this->assertNotNull($user->last_login_at);
    }

    /**
     * Test that user last_login_at is not updated when login fails.
     *
     * @return void
     */
    public function test_user_last_login_at_is_not_updated_after_failed_login(): void
    {
        $user = User::factory()->create([
            'last_login_at' => null,
        ]);

        $this->post('login', [
            'email' => $user->email,
            'password' => 'wrong_password'
        ]);

        $user->refresh();

        $this->assertNull($user->last_login_at);
    }
}
