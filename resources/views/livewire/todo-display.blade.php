<div>
  <div class="card">
    <div class="card-body">
      <h1 class="h5">
        {{ $todo->title }}
      </h1>

      <div>
        Created at:
        {{ $todo->created_at->toDateString() }}
        {{ $todo->created_at->format('g:i A') }}
      </div>

      <div>
        Status:
        @if ($modes['updateStatus'])
          <select class="custom-control w-75" wire:model.defer="todo_status">
            <option value="pending">Pending</option>
            <option value="progress">Progress</option>
            <option value="done">Done</option>
          </select>
          <button class="btn btn-sm btn-light ml-2" wire:click="changeStatus">
            Yes
          </button>
        @else
          <div role="button" wire:click="enterMode('updateStatus')">
            @if ($todo->status == 'pending')
              <span class="badge badge-danger badge-pill">
                Pending
              </span>
            @elseif ($todo->status == 'progress')
              <span class="badge badge-warning badge-pill">
                Progress
              </span>
            @elseif ($todo->status == 'done')
              <span class="badge badge-success badge-pill">
                Done
              </span>
            @else
              {{ $todo->status }}
            @endif
          </div>
        @endif
      </div>

      <!-- Flash message div -->
      @if (session()->has('message'))
        <div class="p-2">
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle mr-3"></i>
            {{ session('message') }}
            <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
              <span class="text-danger" aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      @endif

      @if ($todo->description)
      <hr />
      <div>
        <h2 class="h6">
          Description
        </h2>
        <div>
          {{ $todo->description }}
        </div>
      </div>
      @endif

    </div>
  </div>
</div>
