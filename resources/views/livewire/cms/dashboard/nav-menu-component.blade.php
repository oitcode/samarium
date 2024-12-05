<div>


  <div class="mb-3">
      @if ($modes['list'] || !array_search(true, $modes))
      {{-- Show in bigger screens --}}
      <x-toolbar-classic toolbarTitle="Nav menu">

        @include ('partials.dashboard.spinner-button')

        @if (\App\CmsNavMenu::first())
        @else
          @include ('partials.dashboard.tool-bar-button-pill', [
              'btnClickMethod' => "enterMode('create')",
              'btnIconFaClass' => 'fas fa-plus-circle',
              'btnText' => 'Create',
              'btnCheckMode' => 'create',
          ])
        @endif

      </x-toolbar-classic>
      @endif

  </div>

  <!-- Flash message div -->
  @if (session()->has('message'))
    <div class="p-2">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-3"></i>
        {{ session('message') }}
        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
          <span class="text-danger" aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  @endif


  @if ($modes['create'])
    @livewire ('cms.dashboard.nav-menu-create')
  @elseif ($modes['display'])
    @livewire ('cms.dashboard.nav-menu-display', ['cmsNavMenu' => $displayingCmsNavMenu,])
  @elseif ($modes['list'])
    @livewire ('cms.dashboard.nav-menu-list')
  @endif


</div>
