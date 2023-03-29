<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Webpage;

class CmsWebsiteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAllPublicWebpagesAreAccessible()
    {
        $publicWebpages = Webpage::where('visibility', 'public')->get();

        foreach ($publicWebpages as $publicWebpage) {
            $response = $this->get('/' . $publicWebpage->permalink);

            $response->assertStatus(200);
        }
    }

    public function testAllNonPublicWebpagesAreNotAccessible()
    {
        $nonPublicWebpages = Webpage::where('visibility', '!=', 'public')->get();

        foreach ($nonPublicWebpages as $nonPublicWebpage) {
            $response = $this->get('/' . $nonPublicWebpage->permalink);

            $response->assertStatus(404);
        }
    }
}
