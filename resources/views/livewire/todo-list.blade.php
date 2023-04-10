<div>

  <!-- Flash message div -->
  @if (session()->has('message'))
    @include ('partials.flash-message', [
        'flashMessage' => session('message'),
    ])
  @endif

  @if (false)
  <div class="bg-white mb-3 px-3 py-2">
    {{-- Toolbar --}}
    <div class="my-4-rm">
     <div class="">
       <i class="far fa-filter mr-1"></i>
       Filter
     </div>
    </div>

    <button wire:loading class="btn btn-danger-rm" style="font-size: 1.5rem;">
      <div class="spinner-border text-info mr-3" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </button>

  </div>
  @endif

  <div class="d-flex mb-3">
    <div class="d-flex flex-column justify-content-center mr-4 font-weight-bold">
      <div>
        <i class="fas fa-filter mr-1"></i>
        Filter
      </div>
    </div>
    <div class="d-flex flex-column justify-content-center mr-4 font-weight-bold">
      Status
    </div>
    @if (true)
    <div class="dropdown">
      <button class="btn
          @if ($modes['showOnlyPendingMode'])
            btn-danger
          @elseif ($modes['showOnlyDoneMode'])
            btn-success
          @elseif ($modes['showAllMode'])
            btn-light
          @endif
          dropdown-toggle"
          type="button" id="dropdownMenuButtonToolbar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        @if ($modes['showOnlyPendingMode'])
          Pending
        @elseif ($modes['showOnlyDoneMode'])
          Done
        @elseif ($modes['showAllMode'])
          All
        @else
          Whoops
        @endif
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonToolbar">
        <button class="dropdown-item" wire:click="enterMode('showOnlyPendingMode')">
          Pending
        </button>
        <button class="dropdown-item" wire:click="enterMode('showOnlyDoneMode')">
          Done
        </button>
        <button class="dropdown-item" wire:click="enterMode('showAllMode')">
          All
        </button>
      </div>
    </div>
    @else
    <div>
      a<br/>
      b<br/>
      c<br/>
      d<br/>
    </div>
    @endif
  </div>

  <div class="d-flex mb-1 pl-1" style="font-size: 1rem;">
    @if (false)
    <div class="mr-4">
      Today : {{ $todoDisplayCount }}
    </div>
    @endif
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
            <td class="h5 font-weight-bold d-none d-md-table-cell" wire:click="$emit('displayTodo', {{ $todo }})" role="button">
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
              <button class="dropdown-item" wire:click="confirmDeleteTodo({{ $todo }})">
                <i class="fas fa-trash text-danger mr-2"></i>
                Delete
              </button>
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
