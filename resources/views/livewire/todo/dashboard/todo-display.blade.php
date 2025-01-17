<div>

  <div class="d-flex justify-content-between bg-white-rm py-0 mb-1 bg-white border">
    {{-- Breadcrumb --}}
    <div class="my-2 p-2 d-flex flex-column justify-content-center">
      <div>
      Task
      <i class="fas fa-angle-right mx-2"></i>
      {{ $todo->task_id }}
      </div>
    </div>

    {{-- Top tool bar --}}
    <div>
      <div>
        <div class="mt-0 p-2 d-flex justify-content-between border-rm">

          <div>
            <button class="btn btn-primary p-3" wire:click="$refresh">
              <i class="fas fa-refresh"></i>
            </button>

            <button class="btn btn-danger p-3" wire:click="$dispatch('exitTodoDisplay')">
              <i class="fas fa-times"></i>
              Close
            </button>
          </div>

        </div>
      </div>
    </div>
  </div>

  {{--
     |
     | Task general information
     |
  --}}
  <div>
    <div class="mb-2 h5 font-weight-bold border bg-white">
      @if ($modes['updateTitleMode'])
        <div class="p-3">
          @livewire ('todo.dashboard.todo-edit-title', ['todo' => $todo,])
        </div>
      @else
        <div class="d-flex justify-content-between py-3">
          <div class="pl-3 d-flex flex-column justify-content-center o-heading">
            {{ $todo->title }}
          </div>
          <div>
            <button class="btn btn-outline-primary mx-3" wire:click="enterMode('updateTitleMode')">
              Edit
            </button>
          </div>
        </div>
      @endif
    </div>

    <div class="mb-2">
      <div class="row" style="margin: auto;">
        <div class="col-md-2 border p-3 bg-white o-heading">
          Task ID
        </div>
        <div class="col-md-10 border bg-white p-3">
          {{ $todo->todo_id }}
        </div>
      </div>
    </div>

    <div class="mb-2">
      <div class="row" style="margin: auto;">
        <div class="col-md-2 border p-3 bg-light o-heading">
          Posted Date
        </div>
        <div class="col-md-10 border bg-white p-3">
          {{ $todo->created_at->toDateString() }}
        </div>
      </div>
    </div>

    <div class="mb-2">
      <div class="row" style="margin: auto;">
        <div class="col-md-2 border p-3 bg-light o-heading">
          Due Date
        </div>
        <div class="col-md-10 border bg-white p-3">
          @if ($modes['updateDueDateMode'])
            <div class="p-3">
              @livewire ('todo.dashboard.todo-edit-due-date', ['todo' => $todo,])
            </div>
          @else
            <div class="d-flex justify-content-between">
              <div class="">
                @if ($todo->due_date)
                  {{ $todo->due_date }}
                @else
                  <span class="badge badge-warning badge-pill">
                    Not set
                  </span>
                @endif
              </div>
              <div>
                <button class="btn btn-outline-primary" wire:click="enterMode('updateDueDateMode')">
                  Edit
                </button>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>

    <div class="mb-2">
      <div class="row" style="margin: auto;">
        <div class="col-md-2 border p-3 bg-light o-heading">
          Priority
        </div>
        <div class="col-md-10 border bg-white p-3">
          @if ($modes['updatePriorityMode'])
            <div class="p-3">
              @livewire ('todo.dashboard.todo-edit-priority', ['todo' => $todo,])
            </div>
          @else
            <div class="d-flex justify-content-between">
              <div class="">
                {{ $todo->priority }}
              </div>
              <div>
                <button class="btn btn-outline-primary" wire:click="enterMode('updatePriorityMode')">
                  Edit
                </button>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>

    <div class="mb-2">
      <div class="row" style="margin: auto;">
        <div class="col-md-2 border p-3 bg-light o-heading">
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
                <button class="btn btn-outline-primary" wire:click="enterMode('updateDescriptionMode')">
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

    <div class="o-heading mb-3">
      Assigned to
    </div>

    <div>

      @if ($modes['updateAssignedToMode'])
        @livewire ('todo.dashboard.todo-edit-assigned-to', ['todo' => $todo,])
      @else
        <div class="d-flex justify-content-between">
          <div>
            @if ($todo->assignedTo)
              <i class="fas fa-user-circle mr-1"></i>
              {{ $todo->assignedTo->name }}
            @else
              <span class="badge badge-warning badge-pill">
                Not set
              </span>
            @endif
          </div>

          <div class="">
            <button class="btn btn-outline-primary" wire:click="enterMode('updateAssignedToMode')">
              Edit
            </button>
          </div>
        </div>
      @endif
    </div>
  </div>


  {{--
     |
     | Status
     |
  --}}
  <div class="bg-white border p-3 my-3">

    <div class="o-heading mb-3">
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

          <div class="">
            <button class="btn btn-outline-primary" wire:click="enterMode('updateStatusMode')">
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
  <div class="bg-white border p-3-rm my-3">
    <div class="">
      <div class="d-flex justify-content-between p-3">
        <div>
          <div class="o-heading">
              Delete this task
          </div>
          <div>
            Once you delete, it cannot be undone. Please be sure.
          </div>
        </div>
        <div>
          @if ($modes['deleteMode'])
            <button class="btn btn-danger" wire:click="deleteTodo">
              Confirm delete
            </button>
            <button class="btn btn-light" wire:click="exitMode('deleteMode')">
              Cancel
            </button>
          @else
            <button class="btn btn-outline-danger" wire:click="enterMode('deleteMode')">
              Delete
            </button>
          @endif
        </div>
      </div>
    </div>
  </div>


</div>
