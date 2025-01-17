<div>


  <div class="d-flex justify-content-between bg-white-rm py-0 mb-1 bg-white border">
    {{-- Breadcrumb --}}
    <div class="my-2 p-2 d-flex flex-column justify-content-center">
      <div>
      Contact message
      <i class="fas fa-angle-right mx-2"></i>
      {{ $contactMessage->contact_message_id }}
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

            <button class="btn btn-danger p-3" wire:click="$dispatch('exitContactMessageDisplay')">
              <i class="fas fa-times"></i>
              Close
            </button>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="bg-white p-3 border">

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
                      <select class="custom-control w-75" wire:model="contact_message_status">
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
      </div>

      <div class="my-3 p-3 bg-white border">
        <h2 class="h5 font-weight-bold mb-3">
          Message
        </h2>
        <p class="h5">
          {{ $contactMessage->message }}
        </p>
      </div>
    </div>

    <div class="col-md-4 px-3">
    </div>
  </div>


</div>
