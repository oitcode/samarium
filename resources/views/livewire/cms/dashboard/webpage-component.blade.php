<div>
  @if (false)
  <x-component-header>
    Pages
  </x-component-header>
  @endif

  <x-toolbar-classic toolbarTitle="Pages">

    @include ('partials.dashboard.spinner-button')

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('create')",
        'btnIconFaClass' => 'fas fa-plus-circle',
        'btnText' => 'Create',
        'btnCheckMode' => 'create',
    ])

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
        'btnIconFaClass' => 'fas fa-refresh',
        'btnText' => '',
        'btnCheckMode' => '',
    ])

  </x-toolbar-classic>

  @if (true)
  {{-- Mobile menu --}}
  <x-toolbar-classic-mob>

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('create')",
        'btnIconFaClass' => 'fas fa-plus-circle',
        'btnText' => 'Create',
        'btnCheckMode' => 'createPostMode',
    ])

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('list')",
        'btnIconFaClass' => 'fas fa-list',
        'btnText' => 'List',
        'btnCheckMode' => 'listPostMode',
    ])

    <div class="d-inline-block float-right">
      <div class="dropdown">
        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-cog text-secondary"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" style="font-size: 1rem;">
          <button class="dropdown-item py-2" wire:click="clearModes">
            <i class="fas fa-eraser text-primary mr-2"></i>
            Clear modes
          </button>
        </div>
      </div>
    </div>


    @if ($modes['display'])
      <div class="my-2">
        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "",
            'btnIconFaClass' => 'fas fa-circle',
            'btnText' => 'Post display',
            'btnCheckMode' => 'display',
        ])
      </div>
    @endif

    @include ('partials.dashboard.spinner-button')
  </x-toolbar-classic-mob>

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
  @endif
</div>
