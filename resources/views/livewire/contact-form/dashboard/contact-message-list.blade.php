<div>


  {{--
     |
     | Flash message div
     |
  --}}
  @if (session()->has('message'))
    @include ('partials.flash-message', [
        'flashMessage' => session('message'),
    ])
  @endif


  {{--
     |
     | Filter div
     |
  --}}
  @if (true)
  <div class="mb-1 p-3 bg-white border d-flex justify-content-between">
    <div class="pt-2">
      <div class="d-flex">
        <div class="mr-4 px-2 py-1 border font-weight-bold">
          Total : {{ $contactMessageCount }}
        </div>
      </div>
    </div>
    <div class="font-weight-bold h6 d-flex">
      <div class="d-flex">
        @if (true)
        <div class="d-flex flex-column justify-content-center mr-3 o-heading">
          <i class="fas fa-funnel mr-1"></i>
          Filter
        </div>
        <div class="dropdown">
          <button class="btn
              @if ($modes['showOnlyNewMode'])
                btn-outline-danger
              @elseif ($modes['showOnlyDoneMode'])
                btn-outline-success
              @elseif ($modes['showOnlyProgressMode'])
                btn-warning
              @elseif ($modes['showAllMode'])
                btn-outline-dark border border-dark
              @endif
              dropdown-toggle"
              style="min-width: 100px;"
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
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButtonToolbar">
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


  </div>
  @endif


  {{--
     |
     | Contact message list
     |
  --}}

  @if ($contactMessages && count($contactMessages) > 0)
    <div class="table-responsive">
      <table class="table table-hover shadow-sm border mb-0">
        <thead>
          <tr class="p-4 bg-white text-dark">
            <th class="o-heading">
              ID
            </th>
            <th class="o-heading">
              Sender name
            </th>
            <th class="o-heading">
              Message
            </th>
            <th class="o-heading">
              Date
            </th>
            <th class="o-heading">
              Status
            </th>
            <th class="o-heading text-right">
              Action
            </th>
          </tr>
        </thead>

        <tbody class="bg-white">
          @foreach ($contactMessages as $contactMessage)
            <tr>
              <td>
                {{ $contactMessage->contact_message_id }}
              </td>
              <td class="h6 font-weight-bold">
                {{ $contactMessage->sender_name }}
              </td>
              <td>
                {{ \Illuminate\Support\Str::limit($contactMessage->message, 100, $end=' ...') }}
              </td>
              <td>
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
              <td class="text-right">
                  <button class="btn btn-primary px-2 py-1" wire:click="$dispatch('displayContactMessage', { contactMessage: {{ $contactMessage }} })">
                    <i class="fas fa-pencil-alt"></i>
                  </button>
                  <button class="btn btn-success px-2 py-1" wire:click="$dispatch('displayContactMessage', { contactMessage: {{ $contactMessage }} })">
                    <i class="fas fa-eye"></i>
                  </button>
                  <button class="btn btn-danger px-2 py-1" wire:click="deleteContactMessage({{ $contactMessage }})">
                    <i class="fas fa-trash"></i>
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
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    {{-- Pagination links --}}
    <div class="bg-white border p-2">
      {{ $contactMessages->links() }}
    </div>
  @else
    <div class="p-4 bg-white border text-muted">
      <p class="font-weight-bold h4-rm py-4 text-center-rm" style="color: #fe8d01;">
        <i class="fas fa-exclamation-circle mr-2"></i>
        No contact messages
      <p>
    </div>
  @endif


</div>
