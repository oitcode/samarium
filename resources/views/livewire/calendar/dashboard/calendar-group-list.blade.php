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
            <x-list-edit-button-component clickMethod="$dispatch('displayCalendarGroup', {calendarGroupId: {{ $calendarGroup->calendar_group_id }} })">
            </x-list-edit-button-component>
            <x-list-view-button-component clickMethod="$dispatch('displayCalendarGroup', {calendarGroupId: {{ $calendarGroup->calendar_group_id }} })">
            </x-list-view-button-component>
            <x-list-delete-button-component clickMethod="">
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
