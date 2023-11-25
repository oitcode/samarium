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

        <div class="mb-5">
          <div class="d-flex justify-content-between">
            <div>
              <span class="h4 font-weight-bold">
                Todo
              </span>
            </div>
            @if (false)
            <div>
              <button class="btn mr-2" wire:click="$refresh">
                <i class="fas fa-refresh"></i>
              </button>
              <button class="btn mr-2">
                <i class="fas fa-trash"></i>
              </button>
            </div>
            @endif
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

            <div class="table-responsive">
              <table class="table border-bottom">
                <tbody>
                  <tr>
                    <th>
                      Title
                    </th>
                    <td>
                      @if ($modes['updateTitleMode'])
                        <div class="form-group">
                          <input type="text" class="form-control" wire:model.defer="title" />
                        </div>
                      @else
                        {{ $todo->title }}
                      @endif
                    </td>
                    <td>
                      @if ($modes['updateTitleMode'])
                        <button class="btn btn-success mr-2" wire:click="updateTitle">
                          <i class="fas fa-check-circle"></i>
                        </button>
                        <button class="btn btn-danger" wire:click="exitMode('updateTitleMode')">
                          <i class="fas fa-times-circle"></i>
                        </button>
                      @else
                        <button class="btn" wire:click="enterMode('updateTitleMode')">
                          <i class="fas fa-pencil-alt"></i>
                        </button>
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <th>
                      Date
                    </th>
                    <td>
                      {{ $todo->created_at->toDateString() }}
                    </td>
                    <td>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="my-5">
              <h2 class="h4 font-weight-bold mb-3">
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
        <div class="table-responsive">
          <table class="table border-bottom mb-0">
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
