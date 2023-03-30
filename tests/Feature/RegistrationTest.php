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
     * Todo: This is a design decision for now.
     *       As in the next releases there
     *       will be user registration
     *       too.
     *
     * @return void
     */
    public function testRegistrationPageNotAvailable()
    {
        $response = $this->get('/register');

        $response->assertStatus(404);
    }
}
