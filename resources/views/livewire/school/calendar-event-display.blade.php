<div>


  <div class="bg-white p-3 border">

    {{-- Temp refresh --}}
    <div class="mb-3">
      <i class="fas fa-refresh" wire:click="$refresh"></i>
    </div>

    {{-- Event name --}}
    <div class="my-3">
      <div>
        Event name

        <button class="btn text-primary ml-3" wire:click="enterMode('editNameMode')">
          Edit
        </button>

      </div>
      <div>
        @if ($modes['editNameMode'])
          @livewire ('calendar.dashboard.calendar-event-edit-name', ['calendarEvent' => $calendarEvent,])
        @else
          {{ $calendarEvent->title }}
        @endif
      </div>
    </div>

    {{-- Event date --}}
    <div class="my-3">
      <div>
        Event date

        <button class="btn text-primary ml-3" wire:click="enterMode('editIsHolidayMode')">
          Edit
        </button>

      </div>
      <div>
        {{ $calendarEvent->start_date }}
      </div>
    </div>

    {{-- Is holidar --}}
    <div class="my-3">
      <div>
        Is holiday

        <button class="btn text-primary ml-3" wire:click="enterMode('editIsHolidayMode')">
          Edit
        </button>

      </div>
      <div>
        @if ($modes['editIsHolidayMode'])
          @livewire ('calendar.dashboard.calendar-event-edit-is-holiday', ['calendarEvent' => $calendarEvent,])
        @else
          {{ $calendarEvent->is_holiday }}
        @endif
      </div>
    </div>

  </div>


</div>
