<div>

  {{-- Basic info --}}
  <div class="py-5 mb-2 text-center o-linear-gradient o-border-radius">
    <div class="h2 o-heading">
      {{ $contactMessage->sender_name }}
    </div>
    <div class="h5">
      {{ $contactMessage->created_at }}
    </div>
  </div>

  {{--
  |
  | Toolbar.
  |
  --}}

  <x-toolbar-component>
    <x-slot name="toolbarInfo">
      Contact message
      <i class="fas fa-angle-right mx-2"></i>
      {{ $contactMessage->contact_message_id }}
    </x-slot>
    <x-slot name="toolbarButtons">
      <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$refresh">
        <i class="fas fa-refresh"></i>
      </x-toolbar-button-component>
      <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$dispatch('exitContactMessageDisplay')">
        <i class="fas fa-times-circle text-danger mr-1"></i>
        Close
      </x-toolbar-button-component>
    </x-slot>
  </x-toolbar-component>

  <div class="table-responsive bg-white border mb-2">
    <table class="table border-bottom mb-0">
      <tbody>
        <tr class="border-0">
          <th class="border-0 o-heading">
            Sender Name
          </th>
          <td class="border-0">
            {{ $contactMessage->sender_name }}
          </td>
        </tr>
        <tr>
          <th class="o-heading">
            Sender Phone
          </th>
          <td>
            {{ $contactMessage->sender_phone }}
          </td>
        </tr>
        <tr>
          <th class="o-heading">
            Sender Email
          </th>
          <td>
            {{ $contactMessage->sender_email }}
          </td>
        </tr>
        <tr>
          <th class="o-heading">
            Message
          </th>
          <td>
            {{ $contactMessage->message }}
          </td>
        </tr>
        <tr wire:key="{{ rand() }}">
          <th class="o-heading">
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

  {{-- Delete contact message --}}
  <div class="bg-white border p-3 mb-2">
    <div class="col-md-6 p-3 border rounded">
      <div class="o-heading">
        Delete this contact message
      </div>
      <div>
        Once you delete, it cannot be undone. Please be sure.
      </div>
    </div>
  </div>


</div>
