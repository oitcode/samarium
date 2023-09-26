<div>
  <div class="row">
    <div class="col-md-8">
      <div class="bg-white p-3 border">

        @if (false)
        <div class="px-3-rm mb-5">
          <div class="d-flex justify-content-between">
            <div>
              <span class="h4 font-weight-bold">
                Contact message
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
        @endif

        <div class="row">
          <div class="col-md-4">
            <div class="d-flex justify-content-center">
              <div class="d-flex flex-column justify-content-center h-100">
                @if (false)
                <div class="d-flex justify-content-center">
                  <i class="fas fa-user-circle fa-2x"></i>
                </div>
                <div class="d-flex justify-content-center">
                  {{ $contactMessage->created_at->toDateString() }}
                </div>

                @endif
              </div>
            </div>
          </div>
          <div class="col-md-12 d-flex flex-column justify-content-center">
            @if (false)
            <h2 class="h4">
              Sender information
            </h2>
            @endif

            <div class="table-responsive border-rm">
              <table class="table border-bottom">
                <tbody>
                  <tr class="border-0">
                    <th class="border-0">
                      <i class="fas fa-user-circle mr-1"></i>
                      Sender Name
                    </th>
                    <td class="border-0">
                      {{ $contactMessage->sender_name }}
                    </td>
                  </tr>
                  <tr>
                    <th>
                      <i class="fas fa-phone mr-1"></i>
                      Sender Phone
                    </th>
                    <td>
                      {{ $contactMessage->sender_phone }}
                    </td>
                  </tr>
                  <tr>
                    <th>
                      <i class="fas fa-envelope mr-1"></i>
                      Sender Email
                    </th>
                    <td>
                      {{ $contactMessage->sender_email }}
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>

      <div class="my-3 p-3 bg-white border">
        <h2 class="h5 font-weight-bold mb-3">
          @if (false)
          <i class="fas fa-comment mr-1"></i>
          @endif
          Message
        </h2>
        <p class="h5">
          {{ $contactMessage->message }}
        </p>
      </div>
    </div>

    <div class="col-md-4 px-3">
      <div class="bg-white border">
        <div class="table-responsive border-rm">
          <table class="table border-bottom mb-0">
            <tbody>
              <tr wire:key="{{ rand() }}">
                <th>
                  @if (false)
                  <i class="fas fa-reply mr-1"></i>
                  @endif
                  Status
                </th>
                <td>
                  <div>
                    @if ($modes['updateStatus'])
                      <select class="custom-control w-75" wire:model.defer="contact_message_status">
                        <option value="new">New</option>
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
                        @if ($contactMessage->status == 'new')
                          <span class="badge badge-danger badge-pill">
                            New
                          </span>
                        @elseif ($contactMessage->status == 'progress')
                          <span class="badge badge-warning badge-pill">
                            Progress
                          </span>
                        @elseif ($contactMessage->status == 'done')
                          <span class="badge badge-success badge-pill">
                            Done
                          </span>
                        @else
                          {{ $contactMessage->status }}
                        @endif
                      </div>
                    @endif
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        @if (false)
        <div class="d-flex">
          <div>
            Date
          </div>
          <div>
            2023 July 23
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
