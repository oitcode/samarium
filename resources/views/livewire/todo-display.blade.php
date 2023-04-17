<div>
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

  <div class="row">
    <div class="col-md-8">
      <div class="bg-white p-3 border">

        <div class="px-3-rm mb-5">
          <div class="d-flex justify-content-between">
            <div>
              <span class="h4 font-weight-bold">
                Todo
              </span>
            </div>
            <div>
              <button class="btn mr-2" wire:click="$refresh">
                <i class="fas fa-refresh"></i>
              </button>
              <button class="btn mr-2">
                <i class="fas fa-trash"></i>
              </button>
              <button class="btn mr-2">
                <i class="fas fa-pencil-alt"></i>
              </button>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="d-flex justify-content-center">
              <div class="d-flex flex-column justify-content-center h-100">
              </div>
            </div>
          </div>
          <div class="col-md-12 d-flex flex-column justify-content-center">

            <div class="table-responsive border-rm">
              <table class="table border-bottom">
                <tbody>
                  <tr>
                    <th>
                      @if (false)
                      <i class="fas fa-heading mr-1"></i>
                      @endif
                      Title
                    </th>
                    <td>
                      {{ $todo->title }}
                    </td>
                  </tr>
                  <tr>
                    <th>
                      @if (false)
                      <i class="fas fa-calendar mr-1"></i>
                      @endif
                      Date
                    </th>
                    <td>
                      {{ $todo->created_at->toDateString() }}
                      @if (false)
                      {{ $todo->created_at->format('g:i A') }}
                      @endif
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="my-5">
              <h2 class="h4 font-weight-bold mb-3">
                @if (false)
                <i class="fas fa-comment mr-1"></i>
                @endif
                Description
              </h2>
              <p>
                {{ $todo->description }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 px-3">
      <div class="bg-white border">
        <div class="table-responsive border-rm">
          <table class="table border-bottom mb-0">
            <tbody>
              <tr wire:key="{{ rand() }}">
                <th>
                  <i class="fas fa-reply-rm mr-1"></i>
                  Status
                </th>
                <td>
                  <div>
                    @if ($modes['updateStatus'])
                      <select class="custom-control w-75" wire:model.defer="todo_status">
                        <option value="pending">Pending</option>
                        <option value="progress">Progress</option>
                        <option value="done">Done</option>
                      </select>
                      <div class="my-3">
                        <button class="btn btn-sm btn-success ml-2" wire:click="changeStatus">
                          Save
                        </button>
                        <button class="btn btn-sm btn-danger ml-2" wire:click="exitMode('updateStatus')">
                          Cancel
                        </button>
                      </div>
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
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
