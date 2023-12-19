<div class="bg-info-rm">


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
      <div class="bg-white p-3-rm border">

        @if (false)
        <div class="mb-5">
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
            </div>
          </div>
        </div>
        @endif

        <div class="">

          <div class="p-3-rm">

            <div class="border-bottom p-3">
              <span class="text-muted">
                Title
              </span>
              <br />
              @if ($modes['updateTitleMode'])
                <div class="form-group">
                  <input type="text" class="form-control" wire:model.defer="title" />
                </div>
              @else
                <div class="font-weight-bold h6 mb-0">
                  {{ $todo->title }}
                </div>
              @endif
              @if ($modes['updateTitleMode'])
                <button class="btn btn-success mr-2" wire:click="updateTitle">
                  <i class="fas fa-check-circle"></i>
                </button>
                <button class="btn btn-danger" wire:click="exitMode('updateTitleMode')">
                  <i class="fas fa-times-circle"></i>
                </button>
              @else
                <button class="btn pl-0 text-primary" wire:click="enterMode('updateTitleMode')">
                  <i class="fas fa-pencil-alt"></i>
                </button>
              @endif
            </div>

            <div class="d-flex border-bottom mb-3 pb-3">
              <div class="pt-3 pl-3">
                <span class="text-muted">
                  ID
                </span>
                <br />
                {{ $todo->todo_id }}
              </div>

              <div class="pt-3 pl-3">
                <span class="text-muted">
                  Date
                </span>
                <br />
                {{ $todo->created_at->toDateString() }}
              </div>
            </div>

            <div class="pt-3 pl-3">
              <div class="text-muted mb-3-rm">
                Description
              </div>
              <p>
                @if ($todo->description)
                  {{ $todo->description }}
                @else
                  <span class="text-muted">
                    None
                  </span>
                @endif
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 px-3">
      <div class="bg-white border h-100">
        <div class="table-responsive">
          <table class="table border-bottom-rm mb-0">
            <tbody>
              <tr wire:key="{{ rand() }}">
                <th>
                  Status
                </th>
                <td>
                  <div>
                    @if ($modes['updateStatus'])
                      <select class="custom-control w-75" wire:model.defer="todo_status">
                        <option value="pending">Pending</option>
                        <option value="progress">Progress</option>
                        <option value="deferred">Deferred</option>
                        <option value="cancelled">Cancelled</option>
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
