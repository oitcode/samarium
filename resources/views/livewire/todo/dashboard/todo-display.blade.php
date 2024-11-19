<div>


  {{--
     |
     | Task general information
     |
  --}}
  <div>
    <div class="mb-3 h5 font-weight-bold border bg-white p-3">
      @if ($modes['updateTitleMode'])
        @livewire ('todo.dashboard.todo-edit-title', ['todo' => $todo,])
      @else
        {{ $todo->title }}
        <button class="btn btn-success mx-3" wire:click="enterMode('updateTitleMode')">
          Edit
        </button>
      @endif
    </div>

    <div class="mb-2">
      <div class="row" style="margin: auto;">
        <div class="col-md-2 border p-3 bg-white font-weight-bold">
          Task ID
        </div>
        <div class="col-md-10 border bg-white p-3">
          {{ $todo->todo_id }}
        </div>
      </div>
    </div>

    <div class="mb-2">
      <div class="row" style="margin: auto;">
        <div class="col-md-2 border p-3 bg-light font-weight-bold">
          Posted Date
        </div>
        <div class="col-md-10 border bg-white p-3">
          {{ $todo->created_at->toDateString() }}
        </div>
      </div>
    </div>

    <div class="mb-2">
      <div class="row" style="margin: auto;">
        <div class="col-md-2 border p-3 bg-light font-weight-bold">
          Due Date
        </div>
        <div class="col-md-10 border bg-white p-3">
          {{ $todo->created_at->toDateString() }}
        </div>
      </div>
    </div>

    <div class="mb-2">
      <div class="row" style="margin: auto;">
        <div class="col-md-2 border p-3 bg-light font-weight-bold">
          Priority
        </div>
        <div class="col-md-10 border bg-white p-3">
          <i class="fas fa-circle text-primary mr-1"></i>
          High
        </div>
      </div>
    </div>

    <div class="mb-2">
      <div class="row" style="margin: auto;">
        <div class="col-md-2 border p-3 bg-light font-weight-bold">
          Description
        </div>
        <div class="col-md-10 border bg-white p-3">
          @if ($modes['updateDescriptionMode'])
            @livewire ('todo.dashboard.todo-edit-description', ['todo' => $todo,])
          @else
            <div class="d-flex justify-content-between">
              <div>
                @if ($todo->description)
                  {{ $todo->description }}
                @else
                  <div class="text-secondary">
                    Description not provided
                  </div>
                @endif
              </div>
              <div>
                <button class="btn btn-light" wire:click="enterMode('updateDescriptionMode')">
                  Edit
                </button>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>

  </div>


  {{--
     |
     | Assigned to
     |
  --}}
  <div class="bg-white border p-3 my-3">

    <div class="font-weight-bold mb-3">
      Assigned to
    </div>

    <div>
      Todo
    </div>
  </div>


  {{--
     |
     | Status
     |
  --}}
  <div class="bg-white border p-3 my-3">

    <div class="font-weight-bold mb-3">
      Status
    </div>

    <div>
      @if ($modes['updateStatusMode'])
        @livewire ('todo.dashboard.todo-edit-status', ['todo' => $todo,])

      @else
        <div class="d-flex justify-content-between">
          <div>
            @if ($todo->status == 'pending')
              <span class="badge badge-danger badge-pill">
                Pending
              </span>
            @elseif ($todo->status == 'progress')
              <span class="badge badge-warning badge-pill">
                Progress
              </span>
            @elseif ($todo->status == 'deferred')
              <span class="badge badge-light badge-pill">
                Deferred
              </span>
            @elseif ($todo->status == 'cancelled')
              <span class="badge badge-light badge-pill">
                Cancelled
              </span>
            @elseif ($todo->status == 'done')
              <span class="badge badge-success badge-pill">
                Done
              </span>
            @else
              {{ $todo->status }}
            @endif
          </div>

          <div class="mr-3">
            <button class="btn btn-light" wire:click="enterMode('updateStatusMode')">
              Edit
            </button>
          </div>
        </div>
      @endif
    </div>
  </div>


  {{--
     |
     | Delete task
     |
  --}}
  <div class="bg-white border p-3 my-3">
    <div class="col-md-6 p-0 border rounded">
      <div class="">
        <div class="d-flex justify-content-between p-3">
          <div>
            <div class="">
              <strong>
                Delete this task
              </strong>
            </div>
            <div>
              Once you delete, it cannot be undone. Please be sure.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>
