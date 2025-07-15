<div class="bg-white p-3 pt-4 o-border-radius">

  <div class="d-flex justify-content-between">
    <div>
      <h2 class="h5 o-heading">
        Tasks
      </h2>
    </div>
    <div class="px-3">
      <a href="{{ route('dashboard-todo') }}" class="btn btn-primary px-3" style="border-radius: 10px;">
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
    <div class="py-2 @if(! $loop->last) border-bottom @endif my-2 bg-white">
      <div class="px-3-rm mb-1">
        <div class="o-heading mb-2">
        {{ $todo->title }}
        </div>
      </div>
      <div class="d-flex justify-content-between">
        <div class="px-3-rm">
          <div class="d-flex text-muted">
            <div class="mr-2">
              ID
              {{ $todo->todo_id }}
            </div>
            <div class="px-3">
              <span class="text-muted">
                Due Date
              </span>
              <span class="text-muted font-weight-bold mx-2">
                Not set
              </span>
            </div>
          </div>
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
