<div>


  <!-- Flash message div -->
  @if (session()->has('message'))
    @include ('partials.flash-message', [
        'flashMessage' => session('message'),
    ])
  @endif


  {{-- Filter div --}}
  @if (true)
  <div class="mb-3 p-3 bg-white border">
    <div class="font-weight-bold h5 mb-4">
      Filter
    </div>
    <hr />

    <div class="d-flex">
      <div class="d-flex flex-column justify-content-center mr-4 font-weight-bold">
        Status
      </div>
      @if (true)
      <div class="dropdown">
        <button class="btn
            @if ($modes['showOnlyNewMode'])
              btn-danger
            @elseif ($modes['showOnlyDoneMode'])
              btn-success
            @elseif ($modes['showOnlyProgressMode'])
              btn-warning
            @elseif ($modes['showAllMode'])
              btn-light
            @endif
            dropdown-toggle"
            type="button" id="dropdownMenuButtonToolbar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          @if ($modes['showOnlyNewMode'])
            New
          @elseif ($modes['showOnlyDoneMode'])
            Done
          @elseif ($modes['showOnlyProgressMode'])
            Progress
          @elseif ($modes['showAllMode'])
            All
          @else
            Whoops
          @endif
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonToolbar">
          <button class="dropdown-item" wire:click="enterMode('showOnlyNewMode')">
            New
          </button>
          <button class="dropdown-item" wire:click="enterMode('showOnlyProgressMode')">
            Progress
          </button>
          <button class="dropdown-item" wire:click="enterMode('showOnlyDoneMode')">
            Done
          </button>
          <button class="dropdown-item" wire:click="enterMode('showAllMode')">
            All
          </button>
        </div>
      </div>
      @endif
    </div>
  </div>
  @endif


  <div class="d-flex justify-content-between-rm mb-3 bg-white border ">
    <div class="p-3 flex-grow-1-rm" style="font-size: 1rem;">
      <div class="mr-4">
        Total : {{ $contactMessageCount }}
      </div>
    </div>
    <div class="pt-3">
      <div wire:loading class="pr-3" style="">
        <div class="spinner-border text-info" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
    </div>
  </div>


  {{-- Show in bigger and smaller screens --}}
  <div class="table-responsive">
    @if ($contactMessages && count($contactMessages) > 0)
      <table class="table table-hover shadow-sm border">
        <thead>
          <tr class="{{ env('OC_ASCENT_BG_COLOR', 'bg-success') }}
              {{ env('OC_ASCENT_TEXT_COLOR', 'text-white') }}
              p-4" style="font-size: 1rem;">
            <th>
              ID
            </th>
            <th>
              Sender name
            </th>
            <th class="">
              Message
            </th>
            <th>
              Date
            </th>
            <th class="">
              Status
            </th>
            @if (false)
            <th>
              Action
            </th>
            @endif
          </tr>
        </thead>

        <tbody class="bg-white">
          @foreach ($contactMessages as $contactMessage)
            <tr>
              <td
                  wire:click="$emit('displayContactMessage', {{ $contactMessage }})"
                  role="button">
                {{ $contactMessage->contact_message_id }}
              </td>
              <td class="h6 font-weight-bold"
                  wire:click="$emit('displayContactMessage', {{ $contactMessage }})"
                  role="button">
                {{ $contactMessage->sender_name }}
              </td>
              <td class="" style="font-size: 1rem;"
                  wire:click="$emit('displayContactMessage', {{ $contactMessage }})"
                  role="button">
                {{ \Illuminate\Support\Str::limit($contactMessage->message, 100, $end=' ...') }}
              </td>
              <td class="" style="font-size: 1rem;">
                {{ $contactMessage->created_at->toDateString() }}
              </td>
              <td>
                @if (true)
                @if ($contactMessage->status == 'new')
                  <span class="badge badge-pill badge-danger">
                    New
                  </span>
                @elseif ($contactMessage->status == 'progress')
                  <span class="badge badge-pill badge-warning">
                    Progress
                  </span>
                @elseif ($contactMessage->status == 'done')
                  <span class="badge badge-pill badge-success">
                    Done
                  </span>
                @else
                  {{ $contactMessage->status }}
                @endif
                @endif
              </td>
              @if (false)
              <td>
                @if (false)
                <div class="dropdown">
                  <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-cog text-secondary"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <button class="dropdown-item" wire:click="">
                      <i class="fas fa-file text-primary mr-2"></i>
                      View
                    </button>
                    <button class="dropdown-item" wire:click="">
                      <i class="fas fa-trash text-danger mr-2"></i>
                      Delete
                    </button>
                  </div>
                </div>
                @endif
                <div>
                  <button class="btn" wire:click="deleteContactMessage({{ $contactMessage }})">
                    <i class="fas fa-trash text-danger mr-1"></i>
                    Delete
                  </button>
                  @if ($modes['deleteContactMessageMode'])
                    @if ($deletingContactMessage->contact_message_id == $contactMessage->contact_message_id)
                      <span class="btn btn-danger mx-3" wire:click="confirmDeleteContactMessage">
                        Confirm delete
                      </span>
                      <span class="btn btn-light mr-3" wire:click="deleteContactMessageCancel">
                        Cancel
                      </span>
                    @endif
                  @endif
                </div>

              </td>
              @endif
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <div class="p-3 text-secondary">
        No contact messages.
      </div>
    @endif

  </div>


</div>
