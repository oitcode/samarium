<div class="p-3 p-md-0">

  @if (false)
  <x-component-header>
    Tasks
  </x-component-header>
  @endif

  {{-- Top tool bar --}}
  {{-- Show in bigger screens --}}
  <x-toolbar-classic toolbarTitle="Tasks">
    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('createMode')",
        'btnIconFaClass' => 'fas fa-plus-circle',
        'btnText' => 'New',
        'btnCheckMode' => 'createMode',
    ])

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('listMode')",
        'btnIconFaClass' => 'fas fa-list',
        'btnText' => 'List',
        'btnCheckMode' => 'listMode',
    ])

    @if ($modes['displayMode'])
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "",
          'btnIconFaClass' => 'fas fa-circle',
          'btnText' => 'Task display',
          'btnCheckMode' => 'displayMode',
      ])
    @endif

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "clearModes",
        'btnIconFaClass' => 'fas fa-refresh',
        'btnText' => '',
        'btnCheckMode' => '',
    ])

    @include ('partials.dashboard.spinner-button')
  </x-toolbar-classic>

  {{-- Show in smaller screens --}}
  <div class="mb-3 p-2 d-md-none bg-dark-rm">

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('createMode')",
        'btnIconFaClass' => 'fas fa-plus-circle',
        'btnText' => 'Create',
        'btnCheckMode' => 'createMode',
    ])

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('listMode')",
        'btnIconFaClass' => 'fas fa-list',
        'btnText' => 'List',
        'btnCheckMode' => 'listMode',
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

    @include ('partials.dashboard.spinner-button')

    <div class="clearfix">
    </div>
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


  {{-- Use the required component as per mode --}}
  @if ($modes['createMode'])
    @livewire ('todo-create')
  @elseif ($modes['listMode'])
    @livewire ('todo-list')
  @elseif ($modes['displayMode'])
    @livewire ('todo-display', ['todo' => $displayingTodo,])
  @elseif ($modes['updateMode'])
    @livewire ('todo-update', ['todo' => $updatingTodo,])
  @endif

  @if ($modes['deleteMode'])
    @livewire ('todo-delete-confirm', ['deletingTodo' => $deletingTodo,])
  @endif

</div>
