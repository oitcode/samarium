<div>
  @if (true)

  <div class="mb-3">
      <div class="mb-3 p-2 d-none d-md-block bg-dark-rm">

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

  @if ($modes['create'])
    @livewire ('cms.dashboard.nav-menu-create')
  @elseif ($modes['display'])
    @livewire ('cms.dashboard.nav-menu-display', ['cmsNavMenu' => $displayingCmsNavMenu,])
  @elseif ($modes['list'])
    @livewire ('cms.dashboard.nav-menu-list')
  @endif
</div>
