<?php

namespace Tests\Feature\Cms\Dashboard;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Livewire\Livewire;

use App\User;

class PostComponentTest extends TestCase
{
    /**
     * Test that dashboard cms post component is accessible.
     *
     * @return void
     */
    public function testPostComponentUrlAccessible()
    {
        $response = $this->actingAs(User::where('role', 'admin')->first())->get('/cms/post');

        $response->assertStatus(200);
    }

    /**
     * Test that dashboard cms post contains livewire component.
     *
     * @return void
     */
    public function testPostUrlHasLivewireComponent()
    {
        $response = $this->actingAs(User::where('role', 'admin')->first())
            ->get('/cms/post')
            ->assertSeeLivewire(\App\Livewire\Cms\Dashboard\PostComponent::class);
    }

    /**
     * Test that all modes are false in initial render/mount.
     *
     * @return void
     */
    public function testAllModesAreFalseExceptListMode()
    {
        Livewire::test(\App\Livewire\Cms\Dashboard\PostComponent::class)
            ->assertSet('modes.createPostMode', false)
            ->assertSet('modes.listPostMode', true)
            ->assertSet('modes.displayPostMode', false)
            ->assertSet('modes.createPostCategoryMode', false);
    }

    /**
     * Test that dashboard cms post contains below buttons.
     *
     * 1. Create
     * 2. List
     * 3. Create post category
     * 4. Clear modes
     *
     * @return void
     */
    public function testPostComponentHasRequiredButtons()
    {
        $response = $this->actingAs(User::where('role', 'admin')->first())->get('/cms/post');

        $response->assertSee('Create');
    }

    /**
     * Test that post create component is loaded when create mode is true.
     *
     * @return void
     */
    public function testPostCreateLoadedWhenCreateMode()
    {
        Livewire::test(\App\Livewire\Cms\Dashboard\PostComponent::class) 
            ->set('modes.createPostMode', true)
            ->assertSeeLivewire(\App\Livewire\Cms\Dashboard\WebpageCreate::class);
    }

    /**
     * Test that post list component is loaded when list mode is true.
     *
     * @return void
     */
    public function testPostListLoadedWhenListMode()
    {
        Livewire::test(\App\Livewire\Cms\Dashboard\PostComponent::class) 
            /* ->set('modes.list', true) */
            ->call('clearModes')
            ->call('enterMode', 'listPostMode')
            ->assertSeeLivewire(\App\Livewire\Cms\Dashboard\PostList::class);
    }

    /**
     * Test that post category create component is loaded when create post
     * category mode is true.
     *
     * @return void
     */
    public function testPostCategoryCreateLoadedWhenPostCategoryCreateMode()
    {
        Livewire::test(\App\Livewire\Cms\Dashboard\PostComponent::class) 
            /* ->set('modes.list', true) */
            ->call('enterMode', 'createPostCategoryMode')
            ->assertSeeLivewire(\App\Livewire\Cms\Dashboard\PostCategoryCreate::class);
    }

    /**
     * Test that clear modes call sets all modes to false.
     *
     * @return void
     */
    public function testClearModes()
    {
        Livewire::test(\App\Livewire\Cms\Dashboard\PostComponent::class) 
            ->call('clearModes')
            ->assertSet('modes.createPostMode', false)
            ->assertSet('modes.listPostMode', false)
            ->assertSet('modes.displayPostMode', false);
    }
}
