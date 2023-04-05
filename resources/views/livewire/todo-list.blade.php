<div>

  <!-- Flash message div -->
  @if (session()->has('message'))
    @include ('partials.flash-message', [
        'flashMessage' => session('message'),
    ])
  @endif

  <button wire:loading class="btn btn-danger-rm" style="font-size: 1.5rem;">
    <div class="spinner-border text-info mr-3" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </button>

  <div class="d-flex mb-4 pl-3" style="font-size: 1rem;">
    <div class="mr-4">
      Today : {{ $todoDisplayCount }}
    </div>
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
            <td class="h5 font-weight-bold d-none d-md-table-cell">
              {{ $todo->title }}
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
              <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-cog text-secondary"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <button class="dropdown-item" wire:click="$emit('displayTodo', {{ $todo }})">
                    <i class="fas fa-file text-primary mr-2"></i>
                    View
                  </button>
                  <button class="dropdown-item" wire:click="confirmDeleteTodo({{ $todo }})">
                    <i class="fas fa-trash text-danger mr-2"></i>
                    Delete
                  </button>
                </div>
              </div>

            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

  </div>

  @if ($modes['confirmDeleteMode'])
    @livewire ('todo-list-confirm-delete', ['todo' => $deletingTodo,])
  @endif
</div>
