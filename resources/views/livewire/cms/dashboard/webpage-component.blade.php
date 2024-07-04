<div>
  @if (false)
  <x-component-header>
    Pages
  </x-component-header>
  @endif

  @if ($modes['list'] || !array_search(true, $modes))
  <x-toolbar-classic toolbarTitle="Pages">

    @include ('partials.dashboard.spinner-button')

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('create')",
        'btnIconFaClass' => 'fas fa-plus-circle',
        'btnText' => 'Create',
        'btnCheckMode' => 'create',
    ])

    @if (false)
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
          'btnText' => 'Webpage display',
          'btnCheckMode' => 'display',
      ])
    @endif

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "clearModes",
        'btnIconFaClass' => 'fas fa-close',
        'btnText' => '',
        'btnCheckMode' => '',
    ])
    @endif

  </x-toolbar-classic>
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
    @livewire ('cms.dashboard.webpage-create')
  @elseif ($modes['display'])
    @livewire ('cms.dashboard.webpage-display', ['webpage' => $displayingWebpage,])
  @elseif ($modes['list'])
    @livewire ('cms.dashboard.webpage-list')
  @else
    @livewire ('cms.dashboard.webpage-list')
  @endif
</div>
