<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    /**
     * Test that registration page is not available.
     *
     * @return void
     */
    public function test_registration_page_is_available()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }
}
