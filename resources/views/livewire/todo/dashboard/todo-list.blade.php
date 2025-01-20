<div>


  {{--
     |
     | Filter div
     |
  --}}
  <div class="py-3 px-2 bg-white border d-flex justify-content-between">

    <div class="pt-2 px-2 font-weight-bold border mr-2">
      Total : {{ $todoCount }}
    </div>
    <div class="font-weight-bold h6 d-flex">
      <div class="d-flex justify-content-between-rm border-rm p-3-rm">
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


  {{--
     |
     | Todo list table
     |
  --}}
  <div class="table-responsive">
    <table class="table table-hover shadow-sm border mb-0">
      <thead>
        <tr class="bg-white text-dark p-4">
          <th class="o-heading">
            ID
          </th>
          <th class="o-heading">
            Title
          </th>
          <th class="d-none d-md-table-cell o-heading">
            Priority
          </th>
          <th class="d-none d-md-table-cell o-heading">
            Due date
          </th>
          <th class="d-none d-md-table-cell o-heading">
            Assigned to
          </th>
          <th class="o-heading">
            Status
          </th>
          <th class="o-heading text-right">
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
            <td class="text-right">
              <button class="btn btn-primary px-2 py-1" wire:click="$dispatch('displayTodo', { todo: {{ $todo }} })">
                <i class="fas fa-pencil-alt"></i>
              </button>
              <button class="btn btn-success px-2 py-1" wire:click="$dispatch('displayTodo', { todo: {{ $todo }} })">
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

  {{-- Pagination links --}}
  <div class="bg-white border p-2">
    {{ $todos->links() }}
  </div>

  @if (false)
    @if ($modes['confirmDeleteMode'])
      @livewire ('todo-list-confirm-delete', ['todo' => $deletingTodo,])
    @endif
  @endif


</div>
