<div>

  <!-- Flash message div -->
  @if (session()->has('message'))
    @include ('partials.flash-message', [
        'flashMessage' => session('message'),
    ])
  @endif

  <button wire:loading class="btn btn-danger-rm" style="font-size: 1.5rem;">
    <div class="spinner-border text-info mr-3" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </button>

  {{-- Filter div --}}
  <div class="d-flex mb-3">
    <div class="d-flex flex-column justify-content-center mr-4 font-weight-bold">
      <div>
        <i class="fas fa-filter mr-1"></i>
        Filter
      </div>
    </div>
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
          @elseif ($modes['showAllMode'])
            btn-light
          @endif
          dropdown-toggle"
          type="button" id="dropdownMenuButtonToolbar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        @if ($modes['showOnlyNewMode'])
          New
        @elseif ($modes['showOnlyDoneMode'])
          Done
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
        <button class="dropdown-item" wire:click="enterMode('showOnlyDoneMode')">
          Done
        </button>
        <button class="dropdown-item" wire:click="enterMode('showAllMode')">
          All
        </button>
      </div>
    </div>
    @else
    <div>
      a<br/>
      b<br/>
      c<br/>
      d<br/>
    </div>
    @endif
  </div>

  {{-- Show in bigger screens --}}
  <div class="table-responsive d-none d-md-block">
    @if ($contactMessages && count($contactMessages) > 0)
      <table class="table table-sm-rm table-bordered-rm table-hover shadow-sm border">
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
            <th class="d-none d-md-table-cell">
              Message
            </th>
            <th>
              Date
            </th>
            <th class="d-none d-md-table-cell">
              Status
            </th>
            <th>
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
              <td class="h5 font-weight-bold d-none d-md-table-cell">
                {{ $contactMessage->sender_name }}
              </td>
              <td class="d-none d-md-table-cell font-weight-bold" style="font-size: 1rem;"
                  wire:click="$emit('displayContactMessage', {{ $contactMessage }})"
                  role="button">
                {{ \Illuminate\Support\Str::limit($contactMessage->message, 100, $end=' ...') }}
              </td>
              <td class="d-none d-md-table-cell" style="font-size: 1rem;">
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

  @if (false)
  @if ($modes['confirmDeleteMode'])
    @livewire ('todo-list-confirm-delete', ['todo' => $deletingTodo,])
  @endif
  @endif
</div>
