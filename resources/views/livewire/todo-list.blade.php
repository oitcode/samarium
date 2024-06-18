<div>


  {{-- Flash message div --}}
  @if (session()->has('message'))
    @include ('partials.flash-message', [
        'flashMessage' => session('message'),
    ])
  @endif


  {{-- Filter div --}}
  @if (true)
  <div class="mb-3 p-3 bg-white border d-flex justify-content-between">
    <div class="font-weight-bold h6 d-flex">
      @if (false)
      <div class="mr-4">
        Filter
      </div>
      @endif
      <div class="d-flex">
        @if (true)
        <div class="mr-4 font-weight-bold pt-2">
          @if (false)
          Status
          @endif
          <i class="fas fa-filter mr-2"></i>
        </div>
        @endif
        @if (true)
        <div class="dropdown">
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
                btn-light border
              @endif
              dropdown-toggle"
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
        @endif
      </div>
    </div>


    <div class="pt-2 font-weight-bold">
      Total : {{ $todoCount }}
    </div>
  </div>
  @endif



  {{-- Show in bigger screens --}}
  <div class="table-responsive d-none-rm d-md-block-rm">
    <table class="table table-hover shadow-sm border">
      <thead>
        <tr class="bg-white text-dark
            {{--
            {{ env('OC_ASCENT_BG_COLOR', 'bg-success') }}
            {{ env('OC_ASCENT_TEXT_COLOR', 'text-white') }}
            --}}
            p-4" style="font-size: 1rem;">
          <th>
            ID
          </th>
          <th class="">
            Title
          </th>
          <th class="d-none d-md-table-cell">
            Date
          </th>
          <th class="d-none d-md-table-cell">
            Time
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
            <td class="h6 font-weight-bold" wire:click="$emit('displayTodo', {{ $todo }})" role="button">
              {{ \Illuminate\Support\Str::limit($todo->title, 60, $end=' ...') }}
            </td>
            <td class="d-none d-md-table-cell" style="font-size: 1rem;">
              {{ $todo->created_at->toDateString() }}
            </td>
            <td class="d-none d-md-table-cell">
              {{ $todo->created_at->format('g:i A') }}
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
              <i class="fas fa-ellipsis-h text-secondary"></i>
              @if (false)
              <button class="dropdown-item" wire:click="deleteTodo({{ $todo }})">
                <i class="fas fa-trash text-danger mr-2"></i>
                Delete
              </button>
              @if ($modes['delete'])
                @if ($deletingTodo->todo_id == $todo->todo_id)

                  <span class="btn btn-danger mr-3" wire:click="confirmDeleteTodo">
                    Confirm delete
                  </span>
                  <span class="btn btn-light mr-3" wire:click="deleteTodoCancel">
                    Cancel
                  </span>

                @endif
              @endif
              @endif
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
