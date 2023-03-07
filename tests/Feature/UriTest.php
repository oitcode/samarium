<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UriTest extends TestCase
{
    public function testUrisAreAvailable()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
