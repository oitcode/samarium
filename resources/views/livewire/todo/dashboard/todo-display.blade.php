<div>


  <div class="bg-white-rm border-rm p-3-rm">
    <div class="mt-3-rm mb-3 h5 font-weight-bold border-rm bg-light-rm py-3" {{-- style="border-left: 5px solid #05a;" --}}>
      {{ $todo->title }}
    </div>

    @if (false)
    <div class="">
      <div class="row" style="margin: auto;">
        <div class="col-md-2 border-rm p-3 bg-light font-weight-bold">
          Title
        </div>
        <div class="col-md-10 border-rm p-3">
          @if ($modes['updateTitleMode'])
            @livewire ('todo.dashboard.todo-edit-title', ['todo' => $todo,])
          @else
            <div class="d-flex justify-content-between">
              <div>
                {{ $todo->title }}
              </div>
              <div>
                <button class="btn btn-light" wire:click="enterMode('updateTitleMode')">
                  Edit
                </button>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
    @endif

    <div class="">
      <div class="row" style="margin: auto;">
        <div class="col-md-2 border p-3 bg-white font-weight-bold">
          Task ID
        </div>
        <div class="col-md-10 border bg-white p-3">
          {{ $todo->todo_id }}
        </div>
      </div>
    </div>

    <div class="">
      <div class="row" style="margin: auto;">
        <div class="col-md-2 border p-3 bg-light font-weight-bold">
          Posted Date
        </div>
        <div class="col-md-10 border bg-white p-3">
          {{ $todo->created_at->toDateString() }}
        </div>
      </div>
    </div>

    <div class="">
      <div class="row" style="margin: auto;">
        <div class="col-md-2 border p-3 bg-light font-weight-bold">
          Description
        </div>
        <div class="col-md-10 border bg-white p-3 flex-grow-1-rm">
          @if ($modes['updateDescriptionMode'])
            @livewire ('todo.dashboard.todo-edit-description', ['todo' => $todo,])
          @else
            <div class="d-flex justify-content-between">
              <div>
                {{ $todo->description }}
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


  <div class="bg-white border p-3 my-3">
    @if (false)
    {{-- Danger zone --}}
    <div class="mb-3">
      <strong>
        Danger zone
      </strong>
    </div>
    @endif

    <div class="col-md-6 p-0 border border-secondary-rm rounded">

      {{-- Delete event --}}
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
