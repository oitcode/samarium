<?php

namespace Tests\Feature;

use App\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that registration page is not available.
     *
     * @return void
     */
    public function testRegistrationPageIsAvailable()
    {
        Company::factory()->create();

        $response = $this->get('/register');

        $response->assertStatus(200);
    }
}
