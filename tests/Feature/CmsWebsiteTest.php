<?php

namespace Tests\Feature;

use App\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Webpage;

class CmsWebsiteTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that all public webpages are accessible in cms website.
     *
     * @return void
     */
    public function testPublicWebpagesIsAccessible()
    {
        Company::factory()->create();

        $this->withoutExceptionHandling();

        Webpage::factory()->create([
            'name' => 'Foo Bar',
            'permalink' => 'foobar',
            'visibility' => 'public',
        ]);

        $this->get('/foobar')
            ->assertOk()
            ->assertSee('Foo Bar');
        ;
    }

    /**
     * Test that all non public webpages are not accessible in cms website.
     *
     * @return void
     */
    public function testNonPublicWebpagesIsNotAccessible()
    {
        Webpage::factory()->create([
            'permalink' => 'foo-bar',
            'visibility' => 'private',
        ]);

        $this->get('/foo-bar')->assertNotFound();
    }

    /**
     * Test that all non public webpages are not accessible in cms website.
     *
     * @return void
     */
    public function testNonExistantWebpagesIsNotAccessible()
    {
        Webpage::factory()->create([
            'permalink' => 'foo-bar',
            'visibility' => 'private',
        ]);

        $this->get('/foo-bar')->assertNotFound();
        $this->get('/non-existant')->assertNotFound();
    }
}
