<div>
  
  <x-base-component moduleName="Tasks">

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

      <x-toolbar-dropdown-component toolbarButtonDropdownId="todoToolbarDropdown">
        <x-toolbar-dropdown-item-component clickMethod="enterMode('search')">
          Search
        </x-toolbar-dropdown-item-component>
      </x-toolbar-dropdown-button>
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
