<div>

  <x-list-component>
    <x-slot name="listInfo">
      <div class="py-3 px-2 bg-white border d-flex justify-content-between">
        <div class="px-2 pt-2 font-weight-bold mr-4">
          Total : {{ $totalTodoCount }}
        </div>
        <div class="font-weight-bold h6 d-flex">
          <div class="d-flex">
            <div class="d-flex flex-column justify-content-center mr-3 o-heading">
              <i class="fas fa-funnel mr-1"></i>
              Filter
            </div>
            <div class="dropdown p-0 px-2">
              <button class="btn
                  @if ($modes['showOnlyPendingMode'])
                    btn-outline-danger
                  @elseif ($modes['showOnlyDoneMode'])
                    btn-outline-success
                  @elseif ($modes['showOnlyProgressMode'])
                    btn-warning
                  @elseif ($modes['showOnlyDeferredMode'])
                    btn-outline-secondary
                  @elseif ($modes['showOnlyCancelledMode'])
                    btn-outline-dark
                  @elseif ($modes['showAllMode'])
                    btn-outline-dark border border-dark
                  @endif
                  dropdown-toggle"
                  style="min-width: 100px;"
                  type="button" id="dropdownMenuButtonToolbar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if ($modes['showOnlyPendingMode'])
                  Pending
                @elseif ($modes['showOnlyDoneMode'])
                  Done
                @elseif ($modes['showOnlyProgressMode'])
                  Progress
                @elseif ($modes['showAllMode'])
                  All
                @elseif ($modes['showOnlyDeferredMode'])
                  Deferred
                @elseif ($modes['showOnlyCancelledMode'])
                  Cancelled
                @else
                  Whoops
                @endif
              </button>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButtonToolbar">
                <button class="dropdown-item" wire:click="enterMode('showOnlyPendingMode')">
                  Pending
                </button>
                <button class="dropdown-item" wire:click="enterMode('showOnlyProgressMode')">
                  Progress
                </button>
                <button class="dropdown-item" wire:click="enterMode('showOnlyDoneMode')">
                  Done
                </button>
                <button class="dropdown-item" wire:click="enterMode('showOnlyDeferredMode')">
                  Deferred
                </button>
                <button class="dropdown-item" wire:click="enterMode('showOnlyCancelledMode')">
                  Cancelled
                </button>
                <button class="dropdown-item" wire:click="enterMode('showAllMode')">
                  All
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </x-slot>

    <x-slot name="listHeadingRow">
      <th>
        ID
      </th>
      <th>
        Title
      </th>
      <th class="d-none d-md-table-cell">
        Priority
      </th>
      <th class="d-none d-md-table-cell">
        Due date
      </th>
      <th class="d-none d-md-table-cell">
        Assigned to
      </th>
      <th>
        Status
      </th>
      <th class="text-right">
        Action
      </th>
    </x-slot>

    <x-slot name="listBody">
      @foreach ($todos as $todo)
        <x-table-row-component>
          <td>
            {{ $todo->todo_id }}
          </td>
          <td class="h6 font-weight-bold" wire:click="$dispatch('displayTodo', { todo: {{ $todo }} })" role="button">
            {{ \Illuminate\Support\Str::limit($todo->title, 60, $end=' ...') }}
          </td>
          <td class="d-none d-md-table-cell">
            <i class="fas fa-circle text-primary mr-1"></i>
            {{ $todo->priority }}
          </td>
          <td class="d-none d-md-table-cell">
            @if ($todo->due_date)
              {{ $todo->due_date }}
            @else
              <i class="far fa-question-circle text-muted"></i>
            @endif
          </td>
          <td class="d-none d-md-table-cell">
            @if ($todo->assignedTo)
              <i class="fas fa-user-circle mr-1"></i>
              {{ $todo->assignedTo->name }}
            @else
              <i class="far fa-question-circle text-muted"></i>
            @endif
          </td>
          <td>
            @if ($todo->status == 'pending')
              <span class="badge badge-pill badge-danger">
                Pending
              </span>
            @elseif ($todo->status == 'progress')
              <span class="badge badge-pill badge-warning">
                Progress
              </span>
            @elseif ($todo->status == 'done')
              <span class="badge badge-pill badge-success">
                Done
              </span>
            @else
              {{ $todo->status }}
            @endif
          </td>
          <td class="text-right">
            @if ($modes['confirmDelete'])
              @if ($deletingTodo->todo_id == $todo->todo_id)
                <button class="btn btn-danger mr-1" wire:click="deleteTodo">
                  Confirm delete
                </button>
                <button class="btn btn-light mr-1" wire:click="cancelDeleteTodo">
                  Cancel
                </button>
              @endif
            @endif
            @if ($modes['cannotDelete'])
              @if ($deletingTodo->todo_id == $todo->todo_id)
                <span class="text-danger mr-3">
                  <i class="fas fa-exclamation-circle mr-1"></i>
                  Todo cannot be deleted
                </span>
                <button class="btn btn-light mr-1" wire:click="cancelCannotDeleteTodo">
                  Cancel
                </button>
              @endif
            @endif
            <x-list-edit-button-component clickMethod="$dispatch('displayTodo', { todoId: {{ $todo->todo_id }} })">
            </x-list-edit-button-component>
            <x-list-view-button-component clickMethod="$dispatch('displayTodo', { todoId: {{ $todo->todo_id }} })">
            </x-list-view-button-component>
            <x-list-delete-button-component clickMethod="confirmDeleteTodo({{ $todo->todo_id }})">
            </x-list-delete-button-component>
          </td>
        </x-table-row-component>
      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $todos->links() }}
    </x-slot>
  </x-list-component>

</div>
