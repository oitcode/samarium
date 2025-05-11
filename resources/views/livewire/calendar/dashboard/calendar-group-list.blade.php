<div>

  <x-list-component>
    <x-slot name="listInfo">
      Total calendar groups: {{ $totalCalendarGroupCount }}
    </x-slot>

    <x-slot name="listHeadingRow">
      <th class="w-25">Calendar group ID</th>
      <th>Name</th>
      <th class="text-right">Action</th>
    </x-slot>

    <x-slot name="listBody">
      @foreach ($calendarGroups as $calendarGroup)
        <x-table-row-component>
          <td>
            {{ $calendarGroup->calendar_group_id }}
          </td>
          <td class="font-weight-bold">
            {{ $calendarGroup->name }}
          </td>
          <td class="text-right">
            @if ($modes['confirmDelete'])
              @if ($deletingCalendarGroup->calendar_group_id == $calendarGroup->calendar_group_id)
                <button class="btn btn-danger mr-1" wire:click="deleteCalendarGroup">
                  Confirm delete
                </button>
                <button class="btn btn-light mr-1" wire:click="cancelDeleteCalendarGroup">
                  Cancel
                </button>
              @endif
            @endif
            @if ($modes['cannotDelete'])
              @if ($deletingCalendarGroup->calendar_group_id == $calendarGroup->calendar_group_id)
                <span class="text-danger mr-3">
                  <i class="fas fa-exclamation-circle mr-1"></i>
                  Calendar group cannot be deleted
                </span>
                <button class="btn btn-light mr-1" wire:click="cancelCannotDeleteCalendarGroup">
                  Cancel
                </button>
              @endif
            @endif
            <x-list-edit-button-component clickMethod="$dispatch('displayCalendarGroup', {calendarGroupId: {{ $calendarGroup->calendar_group_id }} })">
            </x-list-edit-button-component>
            <x-list-view-button-component clickMethod="$dispatch('displayCalendarGroup', {calendarGroupId: {{ $calendarGroup->calendar_group_id }} })">
            </x-list-view-button-component>
            <x-list-delete-button-component clickMethod="confirmDeleteCalendarGroup({{ $calendarGroup->calendar_group_id }})">
            </x-list-delete-button-component>
          </td>
        </x-table-row-component>
      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $calendarGroups->links() }}
    </x-slot>
  </x-list-component>

</div>
