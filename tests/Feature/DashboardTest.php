<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\User;

class DashboardTest extends TestCase
{
    /**
     * Test that authenticated users can access dashboard.
     *
     * @return void
     */
    public function test_authenticated_users_can_access_dashboard()
    {
        $response = $this->actingAs(User::first())->get('/dashboard');

        $response->assertSuccessful();
    }
}
