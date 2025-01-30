<div>

  <div class="d-flex justify-content-between">
    <div>
      <h2 class="h5 o-heading">
        Tasks
      </h2>
    </div>
    <div class="px-3">
      <a href="{{ route('dashboard-todo') }}" class="btn btn-primary px-3">
        <span class="font-weight-bold">
          Open Tasks
        </span>
      </a>
    </div>
  </div>

  <div class="text-secondary">
    Showing {{ count($todos) }} out of {{ $totalTodo }} tasks.
  </div>

  @foreach ($todos as $todo)
    <div class="py-3 border my-3 bg-white" style="border-radius: 25px;">
      <div class="px-3 mb-1">
        <span class="font-weight-bold">
        {{ $todo->title }}
        </span>
        <span class="badge badge-pill badge-light border mx-3">
          ID
          {{ $todo->todo_id }}
        </span>
      </div>
      <div class="d-flex justify-content-between">
        <div class="px-3">
          <span class="text-muted">
            Due Date
          </span>
          <span class="text-dark font-weight-bold mx-2">
            Not set
          </span>
        </div>
        <div class="px-3">
          @if ($todo->status == 'pending')
            <i class="fas fa-flag text-danger mx-3"></i>
            <span class="badge badge-pill badge-danger">
              Pending
            </span>
          @elseif ($todo->status == 'progress')
            <i class="fas fa-edit text-muted mx-3"></i>
            <span class="badge badge-pill badge-warning">
              Progress
            </span>
          @elseif ($todo->status == 'done')
            <i class="fas fa-check-circle text-success mx-3"></i>
            <span class="badge badge-pill badge-success">
              Done
            </span>
          @else
            {{ $todo->status }}
          @endif
        </div>
      </div>
    </div>
  @endforeach

</div>
