<div class="bg-white p-3 border">
  <div class="d-flex justify-content-between">
    <div>
      <h2 class="h5 font-weight-bold">
        Todo tasks
        <span class="badge badge-pill badge-primary mx-3">
          {{ $totalTodo }}
        </span>
      </h2>
    </div>
    <div class="px-3">
      <a href="{{ route('dashboard-todo') }}" class="btn btn-outline-primary">
        <i class="fas fa-plus-circle mr-2"></i>
        Open Todo
      </a>
    </div>
  </div>

  @foreach ($todos as $todo)
    <div class="py-2 border rounded my-3">
      <div class="px-3 mb-1">
        <span class="font-weight-bold">
        {{ $todo->title }}
        </span>
        <span class="badge badge-pill badge-light border mx-3">
          Case 1259
        </span>
      </div>
      <div class="d-flex justify-content-between">
        <div class="px-3">
          <span class="text-muted">
            Due Date
          </span>
          <span class="text-dark font-weight-bold mx-2">
            2023 Aug 25
          </span>
        </div>
        <div class="px-3">
          <i class="fas fa-flag text-danger mx-3"></i>
          Pending
        </div>
      </div>
    </div>
  @endforeach

</div>
