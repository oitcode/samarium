<?php

namespace Tests\Feature\Cms\Dashboard;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Livewire\Livewire;

class WebpageCreateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that 
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
