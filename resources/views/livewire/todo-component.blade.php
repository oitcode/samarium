<div class="p-3 p-md-0">

  {{-- Top tool bar --}}
  <div class="mb-3 d-none d-md-block">
    @include ('partials.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('createMode')",
        'btnIconFaClass' => 'fas fa-plus-circle',
        'btnText' => 'New',
        'btnCheckMode' => 'createMode',
    ])

    @include ('partials.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('listMode')",
        'btnIconFaClass' => 'fas fa-list',
        'btnText' => 'List',
        'btnCheckMode' => 'listMode',
    ])

    @include ('partials.spinner-button')

    <div class="clearfix">
    </div>
  </div>


  {{-- Use the required component as per mode --}}
  @if ($modes['createMode'])
    @livewire ('todo-create')
  @elseif ($modes['updateMode'])
    @livewire ('todo-update', ['todo' => $updatingTodo,])
  @else
    @livewire ('todo-list')
  @endif

  @if ($modes['deleteMode'])
    @livewire ('todo-delete-confirm', ['deletingTodo' => $deletingTodo,])
  @endif

</div>
