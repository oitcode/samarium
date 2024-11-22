<div class="p-3 p-md-0">


  {{--
     |
     | Top tool bar
     |
  --}}

  <x-toolbar-classic toolbarTitle="Tasks">

    @include ('partials.dashboard.spinner-button')

    @if (! $modes['displayMode'])
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "enterMode('createMode')",
          'btnIconFaClass' => 'fas fa-plus-circle',
          'btnText' => 'New',
          'btnCheckMode' => 'createMode',
      ])
    @endif

    @if (false)
    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('listMode')",
        'btnIconFaClass' => 'fas fa-list',
        'btnText' => 'List',
        'btnCheckMode' => 'listMode',
    ])
    @endif

    @if ($modes['displayMode'])
      @if (false)
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "",
          'btnIconFaClass' => 'fas fa-circle',
          'btnText' => 'Task display',
          'btnCheckMode' => 'displayMode',
      ])
      @endif

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "clearModes",
        'btnIconFaClass' => 'fas fa-times',
        'btnText' => '',
        'btnCheckMode' => '',
        'btnBsColor' => 'bg-danger text-white',
    ])
    @endif

  </x-toolbar-classic>


  {{--
     |
     | Flash message div
     |
  --}}

  @if (session()->has('message'))
    @include ('partials.flash-message', [
        'flashMessage' => session('message'),
    ])
  @endif


  {{--
     |
     | Use required component as per mode
     |
  --}}

  @if ($modes['createMode'])
    @livewire ('todo.dashboard.todo-create')
  @elseif ($modes['listMode'])
    @livewire ('todo.dashboard.todo-list')
  @elseif ($modes['displayMode'])
    @livewire ('todo.dashboard.todo-display', ['todo' => $displayingTodo,])
  @elseif ($modes['updateMode'])
    @livewire ('todo.dashboard.todo-update', ['todo' => $updatingTodo,])
  @else
    @livewire ('todo.dashboard.todo-list')
  @endif

  @if ($modes['deleteMode'])
    @livewire ('todo.dashboard.todo-delete-confirm', ['deletingTodo' => $deletingTodo,])
  @endif


</div>
