<div>


  {{--
     |
     | Filter div
     |
  --}}
  <div class="mb-1 py-3 px-2 bg-white border d-flex justify-content-between">
    <div class="font-weight-bold h6 d-flex">
      <div class="d-flex justify-content-between">
        <div class="dropdown p-0 px-2">
          <button class="btn
              @if ($modes['showOnlyPendingMode'])
                btn-danger
              @elseif ($modes['showOnlyDoneMode'])
                btn-success
              @elseif ($modes['showOnlyProgressMode'])
                btn-warning
              @elseif ($modes['showOnlyDeferredMode'])
                btn-secondary
              @elseif ($modes['showOnlyCancelledMode'])
                btn-dark
              @elseif ($modes['showAllMode'])
                btn-dark border
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
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonToolbar">
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

    <div class="pt-2 px-2 font-weight-bold border mr-2" style="background-color: #eef; color: #aaf;">
      Total : {{ $todoCount }}
    </div>
  </div>


  {{--
     |
     | Todo list table
     |
  --}}
  <div class="table-responsive">
    <table class="table table-hover shadow-sm border">
      <thead>
        <tr class="bg-white text-dark p-4">
          <th>
            ID
          </th>
          <th class="">
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
          <th>
            Action
          </th>
        </tr>
      </thead>

      <tbody class="bg-white">
        @foreach ($todos as $todo)
          <tr>
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
                <span class="badge badge-warning badge-pill">
                  Not set
                </span>
              @endif
            </td>
            <td class="d-none d-md-table-cell">
              @if ($todo->assignedTo)
                <i class="fas fa-user-circle mr-1"></i>
                {{ $todo->assignedTo->name }}
              @else
                <span class="badge badge-warning badge-pill">
                  Not set
                </span>
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
            <td>
              <button class="btn btn-primary px-2 py-1" wire:click="">
                <i class="fas fa-pencil-alt"></i>
              </button>
              <button class="btn btn-success px-2 py-1" wire:click="">
                <i class="fas fa-eye"></i>
              </button>
              <button class="btn btn-danger px-2 py-1" wire:click="">
                <i class="fas fa-trash"></i>
              </button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  @if (false)
    @if ($modes['confirmDeleteMode'])
      @livewire ('todo-list-confirm-delete', ['todo' => $deletingTodo,])
    @endif
  @endif


</div>
