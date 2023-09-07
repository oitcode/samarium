<div>
  @if (true)

  <div class="mb-3">
      {{-- Show in bigger screens --}}
      <x-toolbar-classic>

        @if (\App\CmsNavMenu::first())
        @else
          @include ('partials.dashboard.tool-bar-button-pill', [
              'btnClickMethod' => "enterMode('create')",
              'btnIconFaClass' => 'fas fa-plus-circle',
              'btnText' => 'Create',
              'btnCheckMode' => 'create',
          ])
        @endif

        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "enterMode('list')",
            'btnIconFaClass' => 'fas fa-list',
            'btnText' => 'List',
            'btnCheckMode' => 'list',
        ])

        @if ($modes['display'])
          @include ('partials.dashboard.tool-bar-button-pill', [
              'btnClickMethod' => "",
              'btnIconFaClass' => 'fas fa-circle',
              'btnText' => 'Navmenu display',
              'btnCheckMode' => 'display',
          ])
        @endif

        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "clearModes",
            'btnIconFaClass' => 'fas fa-eraser',
            'btnText' => 'Clear modes',
            'btnCheckMode' => '',
        ])

        @include ('partials.dashboard.spinner-button')
      </x-toolbar-classic>

      {{-- Show in smaller screens --}}
      <div class="mb-3 p-2 d-md-none">

        @if (\App\CmsNavMenu::first())
        @else
          @include ('partials.dashboard.tool-bar-button-pill', [
              'btnClickMethod' => "enterMode('create')",
              'btnIconFaClass' => 'fas fa-plus-circle',
              'btnText' => 'Create',
              'btnCheckMode' => 'create',
          ])
        @endif

        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "enterMode('list')",
            'btnIconFaClass' => 'fas fa-list',
            'btnText' => 'List',
            'btnCheckMode' => 'list',
        ])

        @if ($modes['display'])
          @include ('partials.dashboard.tool-bar-button-pill', [
              'btnClickMethod' => "",
              'btnIconFaClass' => 'fas fa-circle',
              'btnText' => 'Navmenu display',
              'btnCheckMode' => 'display',
          ])
        @endif

        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "clearModes",
            'btnIconFaClass' => 'fas fa-eraser',
            'btnText' => 'Clear modes',
            'btnCheckMode' => '',
        ])

        @include ('partials.dashboard.spinner-button')

        <div class="clearfix">
        </div>
      </div>

  </div>
  @endif

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
