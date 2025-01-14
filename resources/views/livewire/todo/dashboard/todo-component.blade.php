<div>

  
  <x-base-component moduleName="Product">

    {{--
    |
    | Toolbar.
    |
    --}}

    <x-slot name="toolbar">
      @include ('partials.dashboard.spinner-button')

      @if (! $modes['displayMode'])
        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "enterMode('createMode')",
            'btnIconFaClass' => 'fas fa-plus-circle',
            'btnText' => 'New',
            'btnCheckMode' => 'createMode',
        ])
      @endif

      @if ($modes['displayMode'])
        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "clearModes",
            'btnIconFaClass' => 'fas fa-times',
            'btnText' => '',
            'btnCheckMode' => '',
            'btnBsColor' => 'bg-danger text-white',
        ])
      @endif
    </x-slot>

    <div>

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
  </x-base-component>


</div>
