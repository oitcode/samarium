<?php

namespace Tests\Feature\Cms\Dashboard;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Livewire\Livewire;

use App\User;

class WebpageComponentTest extends TestCase
{
    /**
     * Test that dashboard cms webpage component is accessible.
     *
     * @return void
     */
    public function testDashboardCmsWebpageUrlAccessible()
    {
        $response = $this->actingAs(User::where('role', 'admin')->first())->get('/cms/webpage');

        $response->assertStatus(200);
    }

    /**
     * Test that dashboard cms webpage contains livewire component.
     *
     * @return void
     */
    public function testDashboardCmsWebpageUrlHasLivewireComponent()
    {
        $response = $this->actingAs(User::where('role', 'admin')->first())
            ->get('/cms/webpage')
            ->assertSeeLivewire(\App\Livewire\Cms\Dashboard\WebpageComponent::class);
    }

    /**
     * Test that all modes are false in initial render/mount.
     *
     * @return void
     */
    public function testDashboardCmsWebpageComponentHasAllModesFalse()
    {
        Livewire::test(\App\Livewire\Cms\Dashboard\WebpageComponent::class)
            ->assertSet('modes.create', false)
            ->assertSet('modes.list', false)
            ->assertSet('modes.display', false);
    }

    /**
     * Test that dashboard cms webpage contains livewire component.
     *
     * 1. Create
     * 2. List
     * 3. Clear modes
     *
     * @return void
     */
    public function testDashboardCmsWebpageComponentHasRequiredButtons()
    {
        $response = $this->actingAs(User::where('role', 'admin')->first())->get('/cms/webpage');

        $response->assertSee('Create');
        $response->assertSee('List');
        $response->assertSee('Clear modes');
    }

    /**
     * Test that webpage create component is loaded when create mode is true.
     *
     * @return void
     */
    public function testWebpageCreateLoadedWhenCreateMode()
    {
        Livewire::test(\App\Livewire\Cms\Dashboard\WebpageComponent::class) 
            ->set('modes.create', true)
            ->assertSeeLivewire(\App\Livewire\Cms\Dashboard\WebpageCreate::class);
    }

    /**
     * Test that webpage list component is loaded when list mode is true.
     *
     * @return void
     */
    public function testWebpageListLoadedWhenListMode()
    {
        Livewire::test(\App\Livewire\Cms\Dashboard\WebpageComponent::class) 
            /* ->set('modes.list', true) */
            ->call('enterMode', 'list')
            ->assertSeeLivewire(\App\Livewire\Cms\Dashboard\WebpageList::class);
    }

    /**
     * Test that clear modes call sets all modes to false.
     *
     * @return void
     */
    public function testClearModes()
    {
        Livewire::test(\App\Livewire\Cms\Dashboard\WebpageComponent::class) 
            ->call('clearModes')
            ->assertSet('modes.create', false)
            ->assertSet('modes.list', false)
            ->assertSet('modes.display', false);
    }
}
