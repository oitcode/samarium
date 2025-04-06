<div>

  <x-list-component>
    <x-slot name="listInfo">
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
          </div>
        </div>
      </div>
    </x-slot>

    <x-slot name="listHeadingRow">
      <th>
        ID
      </th>
      <th>
        Sender name
      </th>
      <th>
        Message
      </th>
      <th>
        Date
      </th>
      <th>
        Status
      </th>
      <th class="text-right">
        Action
      </th>
    </x-slot>

    <x-slot name="listBody">
      @foreach ($contactMessages as $contactMessage)
        <x-table-row-component>
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
          </td>
          <td class="text-right">
              <x-list-edit-button-component clickMethod="$dispatch('displayContactMessage', { contactMessageId: {{ $contactMessage->contact_message_id }} })">
              </x-list-edit-button-component>
              <x-list-view-button-component clickMethod="$dispatch('displayContactMessage', { contactMessageId: {{ $contactMessage->contact_message_id }} })">
              </x-list-view-button-component>
              <x-list-delete-button-component clickMethod="deleteContactMessage({{ $contactMessage }})">
              </x-list-delete-button-component>
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
        </x-table-row-component>
      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $contactMessages->links() }}
    </x-slot>
  </x-list-component>

</div>
