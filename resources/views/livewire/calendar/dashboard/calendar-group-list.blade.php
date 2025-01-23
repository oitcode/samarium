<div>


  <x-list-component>
    <x-slot name="listInfo">
      Total calendar groups: {{ \App\CalendarGroup::count() }}
    </x-slot>

    <x-slot name="listHeadingRow">
      <th class="w-25">Calendar group ID</th>
      <th>Name</th>
      <th class="text-right">Action</th>
    </x-slot>

    <x-slot name="listBody">
      @foreach ($calendarGroups as $calendarGroup)
      <tr>

        <td>
          {{ $calendarGroup->calendar_group_id }}
        </td>

        <td class="font-weight-bold">
          {{ $calendarGroup->name }}
        </td>

        <td class="text-right">
          <button class="btn btn-primary px-2 py-1" wire:click="$dispatch('displayCalendarGroup', {calendarGroup: {{ $calendarGroup }} })">
            <i class="fas fa-pencil-alt"></i>
          </button>
          <button class="btn btn-success px-2 py-1" wire:click="$dispatch('displayCalendarGroup', {calendarGroup: {{ $calendarGroup }} })">
            <i class="fas fa-eye"></i>
          </button>
          <button class="btn btn-danger px-2 py-1" wire:click="">
            <i class="fas fa-trash"></i>
          </button>
        </td>

      </tr>
      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $calendarGroups->links() }}
    </x-slot>

  </x-list-component>


</div>
