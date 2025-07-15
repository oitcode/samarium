<div>

  <x-list-component>
    <x-slot name="listInfo">
      <div class="py-3 bg-white-rm d-flex justify-content-between">
        <div class="pt-2">
          <div class="d-flex">
            <div class="mr-4 px-2 font-weight-bold">
              Total : {{ $totalContactMessageCount }}
            </div>
          </div>
        </div>
        <div class="font-weight-bold h6 d-flex">
          <div class="d-flex">
            <div class="d-flex flex-column justify-content-center mr-3 o-heading o-linear-gradient-text-color">
              <i class="fas fa-funnel mr-1"></i>
              Filter
            </div>
            <div class="dropdown">
              <button class="btn
                  @if ($modes['showOnlyNewMode'])
                    btn-danger
                  @elseif ($modes['showOnlyDoneMode'])
                    btn-success
                  @elseif ($modes['showOnlyProgressMode'])
                    btn-warning
                  @elseif ($modes['showAllMode'])
                    btn-light border border-white
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
        Date
      </th>
      <th>
        Sender name
      </th>
      <th>
        Message
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
          <x-table-cell>
            {{ $contactMessage->contact_message_id }}
          </x-table-cell>
          <x-table-cell>
            {{ $contactMessage->created_at->toDateString() }}
          </x-table-cell>
          <td class="h6 font-weight-bold">
            @if ($contactMessage->sender_name)
              {{ $contactMessage->sender_name }}
            @else
              <i class="far fa-question-circle text-muted"></i>
            @endif
          </td>
          <td>
            {{ \Illuminate\Support\Str::limit($contactMessage->message, 100, $end=' ...') }}
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
              @if ($modes['confirmDelete'])
                @if ($deletingContactMessage->contact_message_id == $contactMessage->contact_message_id)
                  <button class="btn btn-danger mr-1" wire:click="deleteContactMessage">
                    Confirm delete
                  </button>
                  <button class="btn btn-light mr-1" wire:click="cancelDeleteContactMessage">
                    Cancel
                  </button>
                @endif
              @endif
              @if ($modes['cannotDelete'])
                @if ($deletingContactMessage->contact_message_id == $contactMessage->contact_message_id)
                  <span class="text-danger mr-3">
                    <i class="fas fa-exclamation-circle mr-1"></i>
                    Contact message cannot be deleted
                  </span>
                  <button class="btn btn-light mr-1" wire:click="cancelCannotDeleteContactMessage">
                    Cancel
                  </button>
                @endif
              @endif
              <x-list-edit-button-component clickMethod="$dispatch('displayContactMessage', { contactMessageId: {{ $contactMessage->contact_message_id }} })">
              </x-list-edit-button-component>
              <x-list-view-button-component clickMethod="$dispatch('displayContactMessage', { contactMessageId: {{ $contactMessage->contact_message_id }} })">
              </x-list-view-button-component>
              <x-list-delete-button-component clickMethod="confirmDeleteContactMessage({{ $contactMessage->contact_message_id }})">
              </x-list-delete-button-component>
          </td>
        </x-table-row-component>
      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $contactMessages->links() }}
    </x-slot>
  </x-list-component>

</div>
