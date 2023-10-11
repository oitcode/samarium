<div>

  <!-- Flash message div -->
  @if (session()->has('message'))
    @include ('partials.flash-message', [
        'flashMessage' => session('message'),
    ])
  @endif


  <div class="d-flex mb-3 pl-3" style="font-size: 1rem;">
    <div class="mr-4">
      Total : {{ $todoCount }}
    </div>
  </div>

  {{-- Show in bigger screens --}}
  <div class="table-responsive d-none d-md-block">
    <table class="table table-sm-rm table-bordered-rm table-hover shadow-sm border">
      <thead>
        <tr class="{{ env('OC_ASCENT_BG_COLOR', 'bg-success') }}
            {{ env('OC_ASCENT_TEXT_COLOR', 'text-white') }}
            p-4" style="font-size: 1rem;">
          <th>
            ID
          </th>
          <th class="d-none d-md-table-cell">
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
            <td class="h6 font-weight-bold d-none d-md-table-cell" wire:click="$emit('displayTodo', {{ $todo }})" role="button">
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
